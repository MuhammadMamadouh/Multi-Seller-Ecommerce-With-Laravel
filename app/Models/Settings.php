<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'email',
        'mobile',
        'description',
        'photo',
        'favicon',
        'meta_description',
        'meta_keywords',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'created_at',
        'updated_at'
    ];


    /**
     * Get Attributes of the model to use it in forms
     *
     * @return string[]
     */
    public static function getreadables()
    {
        return [
            'title',
            'email',
            'mobile',
            'description',
            'photo',
            'favicon',
            'meta_description',
            'meta_keywords',
            'facebook_url',
            'twitter_url',
            'instagram_url',
            'Actions'
            ];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'title'                 => ['type' => 'text'],
            'email'                 => ['type' => 'email'],
            'mobile'                => ['type' => 'text'],
            'meta_description'      => ['type' => 'textarea'],
            'meta_keywords'         => ['type' => 'textarea'],

            'photo' => [
                'type' => 'file',
                'multiple' => false,
            ],
            'favicon' => [
                'type' => 'file',
                'multiple' => false,
            ],
        ];
    }


    public static function translabes()
    {
        return [];
    }


}
