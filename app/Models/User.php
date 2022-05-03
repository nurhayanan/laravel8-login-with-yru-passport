<?php

namespace App\Models;

use App\helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property integer id
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',

        // Userinfo columns
        'prefix',
        'prefix_edu',
        'username',
        'fname',
        'lname',
        'job_position',
        'academic_position',
        'board_position',
        'department',
        'board_department',
        'address_present',
        'address_permanent',
        'mobile',
        'telephone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fillFromYRUPassport($userInfo)
    {
        $data = [
            'username' => $userInfo['username'],
            'email' => $userInfo['email'],
            'password' => 'passport_auth',
            'prefix' => $userInfo['staff']['prefixname'] ?? null,
            'prefix_edu' => $userInfo['staff']['prefixnameacad'] ?? null,
            'fname' => $userInfo['staff']['staffname'] ?? null,
            'lname' => $userInfo['staff']['staffsurname'] ?? null,
            'job_position' => $userInfo['staff']['staffpositionname'] ?? null,
            'department' => $userInfo['staff']['masterdepartmentname'] ?? null,
            'board_position' => $userInfo['staff']['expositionname'] ?? null,
            'board_department' => $userInfo['staff']['exdepartmentname'] ?? null,
            'address_present' => $userInfo['staff']['presentaddress'] ?? null,
            'address_permanent' => $userInfo['staff']['permanentaddress'] ?? null,
            'mobile' => $userInfo['staff']['mobile'] ?? null,
            'telephone' => $userInfo['staff']['telephone'] ?? null
        ];

        // ชื่อแสดง
        $data['name'] = $data['fname'].' '.$data['lname'];

        // ตำแหน่งทางวิชาการ
        $short = str_replace(['นาย', 'นาง', 'น.ส.', 'ดร.'], '', $data['prefix_edu']);
        $data['academic_position'] = helpers::academic_position_s2l($short);

        $this->fill($data);
    }
}
