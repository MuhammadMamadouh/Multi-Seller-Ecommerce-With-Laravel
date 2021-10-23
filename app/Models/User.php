<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'mobile',
        'email',
        'password',
        'photo',
         'address',
        'status',
        'role',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Wish list products
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wishlist() {
        return $this->belongsToMany('App\Models\Product', 'wishlist',  'user_id', 'product_id');
    }

    /**
     * Wish list products
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'name'          => ['type' => 'text'],
            'email'         => ['type' => 'email'],
            'username'      => ['type' => 'text'],
            'password'      => ['type' => 'password'],
            'password_confirmation'      => ['type' => 'password'],
            'mobile'        => ['type' => 'text'],
            'address'       => ['type' => 'text'],

            'photo'         => ['type' => 'file', 'multiple'=> false],

        ];
    }


    public static function translabes()
    {
        return [        ];
    }

}
