<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personil extends Model
{
    protected $table = 'personils';
    protected $fillable = ['jabatan','gaji','jumlah','id_bq'];
}
