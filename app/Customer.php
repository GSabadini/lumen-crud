<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * @package App
 * @property string $name
 * @property date $date_of_birth
 * @property enum $sex
 * @property string $cep
 * @property string $address
 * @property number $number
 * @property string neighborhood
 * @property string complement
 * @property string state
 * @property string city
 * @property mixed id
 */
class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'date_of_birth',
        'sex',
        'cep',
        'address',
        'number',
        'neighborhood',
        'complement',
        'state',
        'city',
    ];
}

