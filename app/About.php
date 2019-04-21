<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class About extends Model
{

    protected $fillable = [
        'id_user',
        'Logo_LKSA',
        'Nama_LKSA',
        'Photo_about',
        'Title_about',
        'Quote',
    ];

    public static function boot()
    {
        parent::boot();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }
    public function profile()
    {
        return $this->hasMany(profile::class, 'id_about')->withTrashed();
    }
    public function profile_kegiatan()
    {
        return $this->hasMany(profile_kegiatan::class, 'id_about')->withTrashed();
    }
}
