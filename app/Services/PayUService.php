<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PayUService
{
    private const POS_ID = 372196;
    private const POS_AUTH_KEY = 'BNHLTjK';

    private const FIRST_KEY = 'ea4088aba4e70e27a693d3dcc15ed66d';
    private const SECOND_KEY = '80d5eea0b2a50905166c967b23ae4e88';

    private const PAYMENT_NEW_URL = 'https://secure.snd.payu.com/paygw/UTF/NewPayment';
    private const PAYMENT_GET_URL = 'https://secure.snd.payu.com/paygw/UTF/Payment/get';

    private const FINISHED_STATUS = 99;

    private const STATUSES = [
        1, 2, 3, 4, 5, 7, 99, 888
    ];
    private const ERRORS = [
        101, 102, 103, 100, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 211, 212, 500, 501, 502, 503, 504, 505, 506, 507, 599, 777, 999
    ];

    private $model;

    private $fields = [
        'amount' => null,
        'desc' => null,
        'order_id' => null,
        'first_name' => null,
        'last_name' => null,
        'session_id' => null,
        'client_ip' => null,
        'ts' => null
    ];

    /**
     * @param int|null $error
     * @return array|bool|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public static function getError(int $error = null)
    {
        if ($error && in_array($error, self::ERRORS)) {
            return trans('payments.payu.error.' . $error);
        }
        return false;
    }

    /**
     * @param int|null $status
     * @return array|bool|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public static function getStatus(int $status = null)
    {
        if ($status && in_array($status, self::STATUSES)) {
            return trans('payments.payu.status.' . $status);
        }
        return false;
    }

    /**
     * @param Model $model
     * @param $orderId
     * @param $sessionId
     * @return Model
     */
    public static function getModel(Model $model, $orderId, $sessionId)
    {
        if (empty($model->id)) {
            return $model::find($orderId)
                         ->where('session_id', $sessionId)
                         ->first();
        } else {
            return $model;
        }
    }

    /**
     * @param array $fields
     * @param string $key
     * @param string $hash
     * @return string
     */
    public static function getSig(array $fields, $key = self::SECOND_KEY, $hash = 'md5')
    {
        $sig = '';
        foreach ($fields as $value) {
            $sig .= $value;
        }
        $sig .= $key;

        return hash($hash, $sig);
    }

    /**
     * @param Request $request
     * @param Model|null $model
     * @return array
     */
    public static function handleReturn(Request $request, Model $model = null)
    {
        $error     = (int) $request->get('error');
        $orderId   = (int) $request->get('orderId');
        $sessionId = $request->get('sessionId');
        $return    = [];

        if ($orderId && $sessionId) {
            if (!is_null($model)) {
                $model = self::getModel($model, $orderId, $sessionId);

                if ($model) {
                    $model->returned = true;
                    $model->save();
                }
            }
            if ($error) {
                $return = self::handleError($request, $model);
            }
        }

        return $return;
    }

    /**
     * @param Request $request
     * @param Model|null $model
     * @return array
     */
    public static function handleError(Request $request, Model $model = null)
    {
        $error     = (int) $request->get('error');
        $orderId   = (int) $request->get('orderId');
        $sessionId = $request->get('sessionId');
        $return    = [];

        if ($error && $orderId && $sessionId) {
            $_error = self::getError($error);

            if ($_error !== false && !is_null($model)) {
                $model = self::getModel($model, $orderId, $sessionId);

                if ($model) {
                    if (empty($model->error)) {
                        $model->error = $error;
                        $model->save();
                    } else {
                        $return = $model->error;
                    }
                }
            }

            if (empty($return)) {
                $return = $_error === false ? $return : [$error => $_error];
            }
        }

        return $return;
    }

    /**
     * @param Request $request
     * @param Model $model
     */
    public static function handleStatus(array $request, Model $model)
    {
        if (!empty($request['pos_id']) && !empty($request['session_id']) && !empty($request['ts']) && !empty($request['sig'])) {
            if ($request['pos_id'] !== self::POS_ID) {
                throw new \Exception('WRONG POS_ID PLACED IN REQUEST: ' . json_encode($request));
            }

            if ($request['sig'] !== self::getSig([
                    $request['pos_id'],
                    $request['session_id'],
                    $request['ts']
                ])) {

                throw new \Exception('WRONG SIG PLACED IN REQUEST: ' . json_encode($request));
            }

            //////////////////////////////////////////////////////////

            $form = [
                'pos_id'     => $request['pos_id'],
                'session_id' => $request['session_id'],
                'ts'         => $_ts = time(),
                'sig'        => self::getSig([
                    $request['pos_id'],
                    $request['session_id'],
                    $_ts
                ], self::FIRST_KEY)
            ];
            unset($_ts);

            $client = new Client();
            $response = $client->post(self::PAYMENT_GET_URL, [
                'form_params' => $form
            ]);

            //////////////////////////////////////////////////////////

            if ($response->getReasonPhrase() === 'OK') {
                $response = simplexml_load_string($response->getBody());

                $payment = [
                    'pos_id'     => (string) $response->trans->pos_id[0],
                    'session_id' => (string) $response->trans->session_id[0],
                    'order_id'   => (string) $response->trans->order_id[0],
                    'status'     => (string) $response->trans->status[0],
                    'amount'     => (string) $response->trans->amount[0],
                    'desc'       => (string) $response->trans->desc[0],
                    'ts'         => (string) $response->trans->ts[0],

                    'trans_id'   => (string) $response->trans->id[0],
                    'sig'        => (string) $response->trans->sig[0]
                ];

                if ($payment['sig'] !== self::getSig([
                        $payment['pos_id'],
                        $payment['session_id'],
                        $payment['order_id'],
                        $payment['status'],
                        $payment['amount'],
                        $payment['desc'],
                        $payment['ts']
                    ])) {

                    throw new \Exception('WRONG SID PLACED IN RESPONSE: ' . json_encode($payment));
                }

                if ($model = self::getModel($model, $payment['order_id'], $payment['session_id'])) {
                    if ($model->status_id !== self::FINISHED_STATUS) {
                        $model->update([
                            'transaction_id' => (int) $payment['trans_id'],
                            'status' => (int) $payment['status']
                        ]);
                        return (int) $payment['status'] === self::FINISHED_STATUS ? $model : null;
                    }
                } else {
                    throw new \Exception('PAYMENT NOT FOUND: ' . json_encode($payment));
                }
            } else {
                throw new \Exception('ERROR RESPONSE STATUS: ' . json_encode($form));
            }
        }
    }

    /**
     * PayUService constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;

        foreach ($this->fields as $field => $value) {
            if (isset($this->model->{$field})) {
                $this->fields[$field] = $this->model->{$field};
            } else {
                throw new \Exception('Required field: ' . $field . ' not in object');
            }
        }
    }

    /**
     * @param Model $model
     * @return array
     */
    public function prepareData()
    {
        $return = [
            'pos_id' => PayUService::POS_ID,
            'pos_auth_key' => PayUService::POS_AUTH_KEY
        ];

        $return = array_merge($return, $this->fields);

        $return['sig'] = $this->sig($return);

        if (!is_null($this->model)) {
            $this->model->sig = $return['sig'];
            $this->model->save();
        }

        return [
            'method' => 'POST',
            'action' => PayUService::PAYMENT_NEW_URL,
            'values' => $return
        ];
    }

    /**
     * @param array $fields
     * @return string
     */
    private function sig(array $fields)
    {
        ksort($fields);

        $sig = '';
        foreach ($fields as $field => $value) {
            $sig .= $field . '=' . urlencode($value) . '&';
        }
        $sig .= PayUService::SECOND_KEY;

        return hash('sha256', $sig);
    }
}
