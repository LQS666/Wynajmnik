<?php

namespace App;

use App\Events\ImageHandleOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'user_address_id', 'slug', 'name', 'desc', 'price', 'premium', 'visible'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $dispatchesEvents = [
        'deleting' => ImageHandleOnDelete::class
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $slug = Str::slug($value);

        if (Product::withTrashed()->where('slug', $slug)->first()) {
            $this->attributes['slug'] = time() . '-' . $slug;
        } else {
            $this->attributes['slug'] = Str::slug($slug);
        }
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class, 'user_address_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function offersUnhandled()
    {
        return $this->offers()->unhandled();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function filterValues()
    {
        return $this->belongsToMany(FilterValue::class);
    }

    public function getSearchResult(): SearchResult
    {
        return new SearchResult($this, $this->name, route('web.product', $this->slug));
    }
}
