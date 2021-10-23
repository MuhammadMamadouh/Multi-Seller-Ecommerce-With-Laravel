<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use App\Observers\SubCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;


    protected $fillable = ['id', 'slug', 'name', 'description', 'photo', 'status', 'main_category_id', 'created_at', 'updated_at'];


    public function main_category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\MainCategory', 'main_category_id');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'brand_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getNameAttribute($value)
    {
        return json_decode($value, true)[getDefaultLang()->abbr];
    }

    /**
     *
     * @return mixed
     */
    public function getDescriptionAttribute($value)
    {
        return  json_decode($value, true)[getDefaultLang()->abbr];
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
        return [ 'name', 'photo', 'status', 'main_category', 'Actions'];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'name'                  => ['type' => 'text'],
            'description'           => ['type' => 'textarea'],
            'status'                => [
                                            'type'      => 'selection',
                                            'values'    => [
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
            'main_category_id'      => [
                                        'type'      => 'selection',
                                        'values'    =>
                                                    collect(MainCategory::active()->get())->map(function ($category) {
                                                        return [
                                                            'text' => $category->getTranslation()->pivot->name,
                                                            'value' => $category->id
                                                        ];
                                                    })
            ],
            'photo'             => [
                                        'type' => 'file',
                                        'multiple' => false,
                                    ],
        ];
    }

    public static function translabes()
    {
        return [
            'name', 'description'
        ];
    }
}
