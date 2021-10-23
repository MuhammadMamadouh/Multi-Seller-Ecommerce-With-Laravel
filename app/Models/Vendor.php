<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'vendors';

    protected $guard = 'seller';

    protected $fillable = ['id', 'name', 'email', 'mobile', 'password', 'address', 'photo', 'status', 'main_category_id'];

    protected $hidden = ['main_category_id'];

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Models\MainCategory', 'main_category_id');
    }


    /**
     * Get Active Vendors
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get Attributes of the model to use it in forms
     *
     * @return string[]
     */
    public static function getreadables()
    {
        return ['name', 'email', 'mobile', 'address', 'photo', 'status', 'main_category', 'Actions'];
    }


    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'name'                      => ['type' => 'text'],
            'mobile'                    => ['type' => 'text'],
            'email'                     => ['type' => 'email'],
            'address'                   => ['type' => 'text'],
            'password'                  => ['type' => 'password'],
            'password_confirmation'     => ['type' => 'password'],
            'photo'                      => [
                                            'type' => 'file',
                                            'multiple' => false,
            ],
            'main_category_id' => [
                                    'type'      => 'selection',
                                    'values'    =>
                                        collect(MainCategory::active()->get())->map(function ($category) {
                                            return [
                                                'text' => $category->name,
                                                'value' => $category->id
                                            ];
                                        })
            ],
        ];
    }

    public static function translabes()
    {
        return [];
    }
}
