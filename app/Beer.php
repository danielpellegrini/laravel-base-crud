<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
  protected $fillable =
  [
    'name',
    'origin_country',
    'appearance',
    'aroma',
    'flavor',
    'alcohol',
    'ibu',
    'srm',
    'image'
  ];

}
