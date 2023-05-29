<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapobt extends Model
{
    protected $primaryKey = 'tgl_jual';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "lapobt";
    protected $fillable = ['tgl_jual', 'kd_brg', 'nm_brg', 'qty_jual'];
}
