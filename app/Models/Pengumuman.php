<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pengumuman extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'pengumuman';

    protected $guarded = ['id'];
}
