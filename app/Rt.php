<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $table = 'rt';

    protected $primaryKey = 'id_rt';

	/**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['rw_id', 'nama_rt'];

    // relasi
    /**
     * Rt belongs to Rw.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rw()
    {
    	// belongsTo(RelatedModel, foreignKey = rw_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Rw::class, 'rw_id', 'id_rw');
    }
}
