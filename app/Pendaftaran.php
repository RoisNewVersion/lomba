<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pendaftaran';

    protected $primaryKey = 'id_pendaftaran';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['lomba_id', 'peserta_id', 'tahun'];
}
