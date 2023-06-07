<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "resep";
    protected $fillable = ['kd_rs', 'kd_brg', 'qty', 'tgl_rs','nama','umur','telepon'];

}
