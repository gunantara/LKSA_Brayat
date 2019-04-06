<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id_user',
        'kegiatan',
    ];

    public static function boot()
    {
        parent::boot();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }
    public function detail_events()
    {
        return $this->hasMany(Detail_events::class, 'id_event')->withTrashed();
    }
}
