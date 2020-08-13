<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'jenis_kelamin',
        'id_prodi',
        'posisi',
        'kelas',
        'angkatan',
        'foto',
    ];

    public function getNamaAttribute($nama){
        return ucwords($nama);
    }

   

    public function telepon(){
        return $this->hasOne('App\Telepon', 'id_siswa');
    }

    public function prodi(){
        return $this->belongsTo('App\Prodi', 'id_prodi');
    }
}
