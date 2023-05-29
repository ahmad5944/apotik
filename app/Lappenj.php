<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lappenj extends Model
{
    protected $table = "datapenjualan";
    protected $fillable = ['no_jual','tgl_jual','total_jual'];
}
