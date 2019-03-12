<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Bridge\User;

class About extends Model
{

    protected $fillable = [
        'id_user',
        'Sejarah',
        'Luas_Tanah',
        'Luas Bangunan',
        'Kerjasama',
    ];

    public static function boot()
    {
        parent::boot();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }
}
