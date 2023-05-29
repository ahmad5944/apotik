<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp_Jual extends Model
{
    protected $primaryKey = 'kd_brg';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "view_temp_jual";
    protected $fillable=['kd_brg','nm_brg','harga','qty_jual','sub_total'];

}
