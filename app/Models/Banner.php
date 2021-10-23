<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'photo', 'status', 'condition'];

    /**
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query): mixed
    {
        return $query->where('status', 'active');
    }


    public function scopeBanner($query)
    {
        return $query->where('condition', 'banner');
    }

    /**
     *
     * @return mixed
     */
    public function getTitleAttribute($value)
    {
        return  json_decode($value, true)[getDefaultLang()->abbr];
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


    public static function getreadables(): array
    {
        return ['title', 'description', 'photo', 'status', 'condition', 'Actions'];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'title'       => ['type' => 'text'],
            'description' => ['type' => 'textarea'],
            'status'      => [
                'type'   => 'selection',
                'values' => [
                    [
                        'text'  => __('validation.attributes.active'),
                        'value' => 'active',
                    ],
                    [
                        'text'  => __('validation.attributes.inactive'),
                        'value' => 'inactive',
                    ]
                ],
            ],
            'condition'   => [
                'type'   => 'selection',
                'values' => [
                    [
                        'text'  => 'banner',
                        'value' => 'Banner',
                    ],
                    [
                        'text'  => 'promo',
                        'value' => 'Promo',
                    ]
                ],
            ],
            'photo'       => [
                'type'     => 'file',
                'multiple' => false,
            ],

        ];
    }


    public static function translabes()
    {
        return [
            'title', 'description'
        ];
    }

}
