<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'category_id'];


    public function category()
    {
        return $this->belongsTo('App\Models\MainCategory', 'category_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function translations()
    {
        return $this->belongsToMany('App\Models\Language', 'weights_translations',
            'weight_id', 'lang_id')
            ->withPivot('name');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transToLanguage($id): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->translations()->wherePivot('lang_id', $id);
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
        return ['name', 'mainCategory', 'Actions',];
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
                        return ['value' => $category->id, 'text' => $category->getTranslation()->pivot->name];
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
