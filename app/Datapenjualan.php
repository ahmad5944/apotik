<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datapenjualan extends Model
{
    protected $primaryKey = 'no_jual';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "datapenjualan";
    protected $fillable = ['no_jual', 'tgl_jual','total_jual'];


}
