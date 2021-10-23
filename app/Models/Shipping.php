<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    protected $fillable = [ 'name', 'delivery_time', 'delivery_charge', 'status'];


    /**
     * Get Active Shipping method
     * @param $query
     * @return mixed
     */
    public function scopeActive($query){
        return $query->where('status', 'active');
    }

    public static function getreadables(): array
    {
        return [ 'name', 'delivery_time', 'delivery_charge', 'status', 'Actions'];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'name'               => ['type' => 'text'],
            'delivery_time'      => ['type' => 'text'],
            'delivery_charge'    => ['type' => 'text'],
            'status'             => [
                                    'type'      => 'selection',
                                    'values'    => [
                                                        [
                                                            'text'      => __('validation.attributes.active'),
                                                            'value'     => 'active',
                                                        ],
                                                        [
                                                            'text'      => __('validation.attributes.inactive'),
                                                            'value'     => 'inactive',
                                                        ]
                ],
            ],
        ];
    }


    public static function translabes()
    {
        return [ ];
    }

}
