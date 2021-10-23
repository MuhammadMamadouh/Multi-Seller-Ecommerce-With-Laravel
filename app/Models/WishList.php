<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wishlist';
    protected $fillable = ['id', 'user_id', 'product_id'];
    public $timestamps = false;


    /**
     * Get Attributes of the model to use it in forms
     *
     * @return string[]
     */
    public static function getreadables()
    {
        return ['user', 'product'];
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
