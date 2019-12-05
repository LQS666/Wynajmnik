<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageHandlerService
{
    public static function storeImage(Request $request, Model $model, string $field = null, string $dir = null) {
        $file = $request->file($field);
        return $file->storeAs(empty($dir) ? $field . 's' : $dir, $model->id . '-' . $field . '.' . $file->clientExtension());
    }

    public static function deleteImage(array $images) {
        Storage::delete($images);
    }
}
