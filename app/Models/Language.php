<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'abbr', 'locale', 'native', 'status', 'direction'];


    /**
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query){
        return $query->where('status', 'active');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeSelection($query){
        return $query->select('id','abbr', 'name', 'direction', 'status');
    }



    /**
     * Get some specific attributes to read
     * @return string[]
     */
    public static function getreadables(): array
    {
        return ['name', 'abbr', 'status', 'direction', 'Actions'];
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
            'abbr' => ['type' => 'text'],
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
            'direction' => [
                'type' => 'selection',
                'values' => [
                    [
                        'text'  => __('validation.attributes.rtl'),
                        'value' => 'rtl',
                    ],
                    [
                        'text' => __('validation.attributes.ltr'),
                        'value' => 'ltr',
                    ]
                ],

            ]
        ];
    }
    public static function translabes()
    {
        return [];
    }
}
