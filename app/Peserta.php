<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'peserta';

    protected $primaryKey = 'id_peserta';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['nama_peserta', 'rw_id', 'rt_id', 'jk'];

    /**
     * Peserta has one Rt.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rt()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel, localKey)
    	return $this->hasOne(Rt::class, 'rt_id', 'id_rt');
    }
    /**
     * Peserta has one Rw.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rw()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel , localKey)
    	return $this->hasOne(Rw::class, 'rw_id', 'id_rt');
    }
}
