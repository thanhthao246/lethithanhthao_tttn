<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'lttt_users';
    /**
     * 
     * 
     * 
     */

    protected $filtable = [
        'name',
        'email',
        'passwword',
    ];
}
