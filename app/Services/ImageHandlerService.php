<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageHandlerService
{
    /**
     * @param string $relationship
     * @param null $return
     * @return null
     */
    private static function getDir(string $relationship, $return = null) {
        if (class_exists($relationship)) {
            $_relationship = new $relationship();
            $return = !empty($_relationship->dir) ? $_relationship->dir : $return;
        }
        return $return;
    }

    public static function storeImage(UploadedFile &$file, Model $model, string $name = null, string $dir = null) {
        if (empty($dir)) {
            $dir = ImageHandlerService::getDir(get_class($model));
        }
        if ($name) {
            $file = $file->storeAs($dir, $model->id . '-' . $name . '.' . $file->clientExtension());
        } else {
            $file = $file->store($dir);
        }
    }

    /**
     * @param Model $model
     * @param string $relationship
     * @param UploadedFile $file
     * @param string|null $dir
     */
    public static function storeRelationshipImage(Model $model, string $relationship, UploadedFile $file, string $dir = null) {
        if (empty($dir)) {
            $dir = ImageHandlerService::getDir($relationship);
        }
        $file = $file->store($dir);

        if (method_exists($model, 'images')) {
            $model->images()->create([
                'file' => $file
            ]);
        }
    }

    /**
     * @param Model $model
     * @param string $relationship
     * @param array $files
     * @param string|null $dir
     */
    public static function storeRelationshipImages(Model $model, string $relationship, array $files, string $dir = null) {
        if (empty($dir)) {
            $dir = ImageHandlerService::getDir($relationship);
        }
        foreach ($files as $key => $file) {
            ImageHandlerService::storeRelationshipImage($model, $relationship, $file, $dir);
        }
    }

    /**
     * @param array $images
     */
    public static function deleteImages(array $images = []) {
        if (!empty($images)) {
            Storage::delete($images);
        }
    }
}
