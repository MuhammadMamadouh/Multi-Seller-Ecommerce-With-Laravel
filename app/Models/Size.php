<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'category_id'];


    public function getNameAttribute($value)
    {
        return  json_decode($value, true)[getDefaultLang()->abbr];

    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'products_sizes', 'size_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\MainCategory', 'category_id');
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
        return ['name', 'category_id', 'Actions'];
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
            'category_id' => [
                'type' => 'selection',
                'values' =>
                    collect(MainCategory::all())->map(function ($category) {
                        return ['value' => $category->id, 'text' => $category->name];
                    }),
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
