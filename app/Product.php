<?php

namespace App;

use App\Events\ImageHandleOnDelete;
use App\Services\GlobalService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        $this->attributes['slug'] = GlobalService::generateSlug($value, $this, true);
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function offersUnhandled()
    {
        return $this->offers()->unhandled();
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class, 'user_address_id');
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
