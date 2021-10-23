<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'color'];



    /**
     * Get Translated name attribute
     * @return mixed
     */
    public function getNameAttribute($value)
    {

        return json_decode($value, true)[getDefaultLang()->abbr];
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
        return ['name', 'color', 'Actions'];
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
            'color' => ['type' => 'color']
        ];
    }


    /**
     * get Translatable attributes
     * @return string[]
     */
    public static function translabes()
    {
        return [
            'name'
        ];
    }
}
