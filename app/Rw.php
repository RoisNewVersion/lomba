<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $table = 'rw';

    protected $primaryKey = 'id_rw';

	/**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['nama_rw'];
}
