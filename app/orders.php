<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = ['tgl_orders', 'id', 'id_cust'];
}
