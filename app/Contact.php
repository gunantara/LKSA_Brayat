<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class Contact extends Model
{
    protected $fillable = [
        'id_user',
        'email',
        'Telp',
        'Alamat',
        'No_Rekening',
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
