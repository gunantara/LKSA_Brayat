<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'id_user',
        'Program',
        'Rinci_Program',
        'Tujuan_Program',
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
