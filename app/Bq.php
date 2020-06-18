<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bq extends Model
{
    protected $table = 'bqs';
    protected $fillable = ['nama','nilai','instansi','lama_tender'];
}
