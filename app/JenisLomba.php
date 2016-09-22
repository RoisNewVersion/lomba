<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisLomba extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jenis_lomba';

    protected $primaryKey = 'id_lomba';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['nama_lomba', 'waktu', 'keterangan'];
}
