<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'street_number',
        'apartment_number',
        'city',
        'state',
        'zip_code',
        'country',
        'profile_picture'
    ];

    public $timestamps = true;
}