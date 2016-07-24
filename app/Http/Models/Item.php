<?php

namespace App\Http\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Eloquent
{
    use SoftDeletes;

    protected $table = 'items';

}
