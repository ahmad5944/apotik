<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasmasuk extends Model
{
    protected $table = "jurnal";
    protected $fillable = ['no_jurnal','tgl_jurnal','no_akun','debet', 'kas'];
}
