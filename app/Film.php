<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'code', 'title', 'description', 'director', 'producer', 'release_date', 'rt_score'];

    public function people() {
        return $this->belongsToMany(People::class);
    }
}
