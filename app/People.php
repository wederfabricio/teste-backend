<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['id', 'code', 'name', 'gender', 'age', 'eye_color', 'hair_color'];

    public $timestamps = false;

    public function films() {
        return $this->belongsToMany(Film::class);
    }
}
