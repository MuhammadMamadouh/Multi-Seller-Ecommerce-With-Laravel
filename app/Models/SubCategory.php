<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use App\Observers\SubCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'slug','name', 'photo', 'status', 'main_categories_id', 'parent_id', 'created_at', 'updated_at'];



    protected static function boot()
    {
        parent::boot();
        SubCategory::observe(SubCategoryObserver::class);

    }

    public function getNameAttribute($value)
    {
        return json_decode($value, true)[getDefaultLang()->abbr];

    }

    /**
     * Get The Main Category of this subcategory
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mainParent()
    {
        return $this->belongsTo('App\Models\MainCategory', 'main_categories_id');
    }

    /**
     * Get The Main Category of this subcategory
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subParent()
    {
        return $this->belongsTo('App\Models\SubCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\SubCategory', 'parent_id')->where('parent_id', $this->getKey());
    }

    /**
     * Check if the specific category has children
     * @return bool
     */
    public function hasChildren(){
        return count($this->children()->get()) > 0;
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Return Grandsons of subcategories for a specific main Category
     * @param $query
     * @return mixed
     */
    public function scopeGrandson($query)
    {
        return $query->where('parent_id', '0');
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
        return ['name', 'status', 'photo', 'parent_name', 'main_category', 'Actions'];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'name'              => ['type' => 'text'],
            'status'            => [
                                        'type'      => 'selection',
                                        'values'    => [
                                            [
                                                'text'      => __('validation.attributes.active'),
                                                'value'     => 'active',
                                            ],
                                            [
                                                'text'      => __('validation.attributes.inactive'),
                                                'value'     => 'inactive',
                                            ]
                                        ],
                                    ],
            'photo'             => [
                                'type' => 'file',
                                'multiple' => false,
            ],
        ];
    }

    /**
     * Get Translables Attributes of a model
     * @return string[]
     */
    public static function translabes()
    {
        return [
            'name'
        ];
    }

    public function relationship(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->children();
    }

}
