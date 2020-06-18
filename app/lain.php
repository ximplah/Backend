<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lain extends Model
{
    protected $table = 'lains';
    protected $fillable = ['nama','nominal','jumlah','id_bq'];
}
