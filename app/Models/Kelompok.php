<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kelompok extends Model
{
    use HasFactory;

    protected $hidden = [
        'remember_token',
    ];
    protected $guarded = [
        'id', '_token', 
    ];
    protected $dates = ['created_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kelompok) {
            $lastId = self::max('id');
            $nextId = $lastId + 1;

            if ($nextId < 10) {
                $kelompok->kode_kelompok = 'KL000' . $nextId;
            } elseif ($nextId < 100) {
                $kelompok->kode_kelompok = 'KL00' . $nextId;
            } elseif ($nextId < 1000) {
                $kelompok->kode_kelompok = 'KL0' . $nextId;
            }
        });
    }

    // Tambahkan method destroy di sini
    public static function destroyKelompok($id)
    {
        $kelompok = self::find($id);
        if ($kelompok) {
            return $kelompok->delete();
        }
        return false;
    }
}
