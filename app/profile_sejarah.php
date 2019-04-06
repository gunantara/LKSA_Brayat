<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class profile_sejarah extends Model
{
    protected $fillable = [
        'id_about',
        'Photo',
        'Title',
        'Profile_sejarah'
    ];
    public static function boot()
    {
        parent::boot();
    }
    public function about()
    {
        return $this->belongsTo(About::class, 'id_about')->withTrashed();
    }
}
