<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Prodi extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'prodis';

    protected $guarded = ['id'];
}
