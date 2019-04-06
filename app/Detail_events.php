<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Detail_events extends Model
{
    protected $fillable = [
        'id_event',
        'keterangan',
        'tgl_mulai',
        'tgl_berakhir'
    ];

    public static function boot()
    {
        parent::boot();
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event')->withTrashed();
    }
}
