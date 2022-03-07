<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
   protected $fillable = ['title', 'description', 'name_uri', 'rental_price', 'sale_price'];

}
