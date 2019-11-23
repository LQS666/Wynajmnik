<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductPicture extends Model
{
    protected $fillable = [
        'product_id', 'name', 'alt', 'file', 'visible'
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        if (empty($this->attributes['alt'])) {
            $this->attributes['alt'] = $value;
        }
    }

    public function getFileAttribute() {
        return Str::startsWith($this->file, 'http') ? $this->file : Storage::url($this->file);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
