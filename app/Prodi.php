<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $fillable = ['nama_prodi'];

    public function profil(){
        return $this->hasMany('App\Profil', 'id_prodi');
    }
}
