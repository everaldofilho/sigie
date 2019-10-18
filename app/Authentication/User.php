<?php

namespace App\Authentication;

use Illuminate\Contracts\Auth\Authenticatable;

class User implements Authenticatable
{

    protected $id;
    protected $username;
    protected $password;
    protected $token;
    
    private static $users = [
        ['id'=>1, 'username'=> 'teste1', 'password'=> '123', 'token' => 'teste123456'],
        ['id'=>2, 'username'=> 'teste2', 'password'=> '123', 'token' => 'teste123458'],
    ];

    public function __construct(Array $props = [])
    {
        foreach ($props as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function findById($id)
    {
        foreach (self::$users as $user) {
            if ($user['id'] == $id) {
                return new self($user);
            }
        }
    }

    public static function findByToken($token)
    {
        foreach (self::$users as $user) {
            if ($user['token'] == $token) {
                return new self($user);
            }
        }
        return null;
    }

    public static function login($login, $senha)
    {
        foreach (self::$users as $user) {
            if ($user['username'] == $login && $user['password'] == $senha) {
                return new self($user);
            }
        }
        return null;
    }

    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id ;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRememberToken()
    {
        return $this->token;
    }

    /**
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // Store a new token user for the "remember me" functionality
    }

    /**
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->token;
    }
}