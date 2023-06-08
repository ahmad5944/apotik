<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //jika tidak di definisikan makan primary akan terdetek id
    protected $primaryKey = 'no_jual';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "penjualan";
    protected $fillable = ['no_jual', 'tgl_jual', 'total','kd_rs'];

    public function noJual()
    {
        return $this->belongsTo('App\Detaildatapenjualan', 'no_jual', 'no_jual');
    }

}
