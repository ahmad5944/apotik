<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $primaryKey = 'kd_rs';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "resep";
    protected $fillable = ['kd_rs','tgl_rs','nama','umur','telepon'];

}
