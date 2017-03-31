<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'cover_image', 'phone', 'UsdToAzn'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->status;
    }

    public function exists()
    {
        $email = $this->email;

        $count = DB::table('users')->where('email', $email)->count();

        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function requests()
    {
        if ($this->status == 5) {
            return DB::select("SELECT
            *,
            COUNT(id) as `new_requests`,
            (SELECT COUNT(id) FROM requests WHERE status = 1) as `all_requests`
            FROM
            requests
            WHERE 
            admin_seen = 0
            ");
        } elseif ($this->status == 1) {
            return DB::select("SELECT
            *,
            COUNT(id) as `new_requests`,
            (SELECT COUNT(id) FROM requests WHERE status = 1) as `all_requests`
            FROM
            requests
            WHERE 
            user_seen = 0 AND user_id = $this->id
            ");
        }
    }
}
