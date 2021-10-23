<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';
    protected $fillable = ['id', 'main_category_id'];
    protected $with = 'translations';
    public $timestamps = false;


    /**
     * Get Translated name attribute
     * @return mixed
     */
    public function getNameAttribute()
    {
         $this->attributes['name'] = $this->getTranslation()->pivot->name;
        return $this->attributes['name'];
    }

    public function mainCategory()
    {
        return $this->belongsTo('App\Models\MainCategory', 'main_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function translations()
    {
        return $this->belongsToMany('App\Models\Language', 'attributes_translations',
            'attribute_id', 'lang_id')
            ->withPivot('name');
    }


    public function getTranslation()
    {
        $default_lang = getDefaultLang();
        return $this->translations()->where('lang_id', $default_lang->id)->first();
    }

    /**
     * Get Attributes of the model to use it in forms
     *
     * @return string[]
     */
    public static function getreadables()
    {
        return ['name', 'main_category_id', 'Actions'];
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
            'main_category_id'  => [
                'type' => 'selection',
                'values' =>
                    collect(MainCategory::all())->map(function ($category) {
                        return ['value' => $category->id, 'text' => $category->getTranslation()->pivot->name];
                    }),
            ],
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
