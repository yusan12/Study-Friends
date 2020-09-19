<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    public function selectUserFindById($id)
{
    // 「SELECT id, name, email WHERE id = ?」を発行する
    $query = $this->select([
        'id',
        'name',
        'email'
    ])->where([
        'id' => $id
    ]);
    // first()は1件のみ取得する関数
    return $query->first();
}
/**
     * IDで指定したユーザを更新する
     */
    public function updateUserFindById($user)
    {
        // 「UPDATE FROM users SET name = ?, email = ? WHERE id = ?」を発行する
        return $this->where([
            'id' => $user['id']
        ])->update([
            'name' => $user['name'],
            'email' => $user['email']
        ]);
    }
}
