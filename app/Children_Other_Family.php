<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Children_Other_Family extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'id_children',
        'Nama',
        'Tempat_lahir',
        'Tgl_lahir',
        'Sekolah',
        'Kelas',
        'Keterangan',
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function children()
    {
        return $this->belongsTo(Children::class, 'id_children')->withTrashed();
    }
}
