<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table = "detail_penjualan";
    protected $fillable = ['no_jual', 'kd_brg', 'qty_jual','subtotal'];

}
