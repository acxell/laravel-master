<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Mahasiswa extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'mahasiswas';

    protected $guarded =['id'];

    public function proposal()
    {
        return $this->belongsToMany(Proposal::class, 'mahasiswa_proposals')->withTimestamps();
    }
}
