<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

final class GlobalService
{
    public static function generateSlug(string $value, Model $model, $soft = false): string
    {
        $slug = Str::slug($value);

        $is_slug = $model->where('slug', $slug);

        if ($soft) {
            $is_slug = $is_slug->withTrashed();
        }

        if (!is_null($model['id'])) {
            $is_slug = $is_slug->where('id', '!=', $model['id']);
        }

        if ($is_slug->first()) {
            return time() . '-' . $slug;
        } else {
            return $slug;
        }
    }

    private function __construct() {}
}
