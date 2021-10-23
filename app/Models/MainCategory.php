<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'slug', 'name', 'photo', 'status', 'created_at', 'updated_at'];


    protected static function boot()
    {
        parent::boot();
        MainCategory::observe(MainCategoryObserver::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Check if the specific category has children
     * @return bool
     */
    public function hasChildren(){
        return count($this->children()->get()) > 0;
    }

    /**
     * Get Translated name attribute
     * @return mixed
     */
    public function getNameAttribute($value)
    {
        return json_decode($value, true)[getDefaultLang()->abbr];
    }


    public function products()
    {
        return $this->hasMany('App\Models\Product', 'main_categories_id');
    }


    /**
     * Get All Vendor of a specific main category
     * one to Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vendors()
    {
        return $this->hasMany('App\Models\Vendor', 'main_category_id');
    }

    /**
     * Get All Brands of a specific main category
     * one to Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brands()
    {
        return $this->hasMany('App\Models\Brand', 'main_category_id');
    }

    /**
     * Get All Sizes of a specific main category
     * one to Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sizes()
    {
        return $this->hasMany('App\Models\Size', 'category_id');
    }
    /**
     * Get All Sizes of a specific main category
     * one to Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany('App\Models\Attribute', 'main_category_id');
    }


    /**
     * Get All Vendor of a specific main category
     * one to Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Models\SubCategory', 'main_categories_id');
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    public function transToLanguage($language, $attribute)
    {
        return json_decode($this->attributes[$attribute], true)[$language];

    }


    /**
     * Get Attributes of the model to use it in forms
     *
     * @return string[]
     */
    public static function getreadables()
    {
        return ['name', 'status', 'photo', 'sub_categories', 'Actions'];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'name' => ['type' => 'text'],
            'status' => [
                'type' => 'selection',
                'values' => [
                    [
                        'text' => __('validation.attributes.active'),
                        'value' => 'active',
                    ],
                    [
                        'text' => __('validation.attributes.inactive'),
                        'value' => 'inactive',
                    ]
                ],
            ],
            'photo' => [
                'type' => 'file',
                'multiple' => false,
            ],
        ];
    }


    public static function translabes()
    {
        return [
            'name'
        ];
    }


}
