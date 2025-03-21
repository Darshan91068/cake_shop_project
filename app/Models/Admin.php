<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Make sure this is imported
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = ['email', 'password'];
    protected $hidden = ['password', 'remember_token'];
}
