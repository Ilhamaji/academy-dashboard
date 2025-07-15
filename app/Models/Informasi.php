<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    //
    protected $table = 'informasi';

    protected $fillable = ['nama',
                        'npsn',
                        'nss',
                        'kodepos',
                        'alamat',
                        'no_telp',
                        'email',
                        'website',
                        'logo',
                        'nama_kepsek',
                        'nip_kepsek',
                    ];
}
