<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdFilling extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal', 'nama_produk', 'ka_group', 'ukuran', 'no_lot', 'bagian', 'foto_standar', 'foto_real',
        'penanggung_jawab', 'waktu_awal', 'downtime', 'foto_awal_dt', 'foto_akhir_dt', 'waktu_akhir',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {
            $model->downtime = $model->downtime ?? 0;
            $model->foto_awal_dt = $model->foto_awal_dt ?? null;
            $model->foto_akhir_dt = $model->foto_akhir_dt ?? null;
        });
    }
}