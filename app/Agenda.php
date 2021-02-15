<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Agenda extends Model
{
    protected $guarded = [];
    // protected $fillable = ['user_id', 'tanggal', 'jam', 'nama_kegiatan', 'tempat', 'disposisi', 'satker', 'slide'];

    protected $dates = ['tanggal'];

    // public function getJenisAttribute(): string
    // {
    //     return [
    //         'int' => 'Internal',
    //         'pub' => 'Publik',
    //         'und' => 'Undangan',
    //         'bat' => 'Batal'
    //     ][$this->user_type];
    //     // $agenda->jenis;
    // }


    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }


    public function getWaktumulaiAttribute()
    {
        \Date::setLocale('id');
        return Date::parse($this->attributes['mulai'])->format(' H:s');
    }

    public function getWaktuselesaiAttribute()
    {
        \Date::setLocale('id');
        return Date::parse($this->attributes['selesai'])->format(' H:s');
    }

}
