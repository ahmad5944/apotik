<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detaildatapenjualan extends Model
{
    protected $primaryKey = 'no_jual';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "detail_datapenjualan";
    protected $fillable = ['no_jual', 'kd_brg', 'qty_jual', 'sub_jual'];


}
