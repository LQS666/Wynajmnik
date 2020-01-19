<?php

namespace App;

use App\Events\ImageHandleOnDelete;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductPicture extends Model
{
    public $dir = 'product_picture';

    protected $fillable = [
        'product_id', 'alt', 'file', 'visible'
    ];

    protected $dispatchesEvents = [
        'deleting' => ImageHandleOnDelete::class
    ];

    public function getUrlAttribute()
    {
        return Str::startsWith($this->file, 'http') ? $this->file : Storage::url($this->file);
    }

    public function setFileAttribute($value)
    {
        $this->attributes['file'] = $value;
        if (empty($this->attributes['alt'])) {
            $this->attributes['alt'] = explode('/', $this->attributes['file']);
            $this->attributes['alt'] = end($this->attributes['alt']);
        }
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
