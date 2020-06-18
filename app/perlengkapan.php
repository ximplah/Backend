<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perlengkapan extends Model
{
    protected $table = 'perlengkapans';
    protected $fillable = ['nama','nominal','jumlah','id_bq'];
}
