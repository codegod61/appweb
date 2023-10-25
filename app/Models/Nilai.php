<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "nilai";
    protected $primaryKey = ["nisn_siswa", "kode_matkul"];
    protected $fillable = ['nisn_siswa', 'kode_matkul', 'nilai', 'predikat', 'ket'];
    public $incrementing = false;
    use HasFactory;

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'kode_mapel', 'kode');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn_siswa', 'nisn');
    }
}
