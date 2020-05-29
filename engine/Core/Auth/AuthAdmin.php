<?php


namespace Engine\Core\Auth;


use Engine\Helper\Cookie;

class AuthAdmin implements Auth
{
    protected $cookie;
    protected $authorized = false;

    public function __construct(Cookie $cookie)
    {
        $this->cookie = $cookie;
    }

    public function authorized()
    {
        return $this->authorized;
    }

    public function hashUser()
    {
        return $this->cookie->get('auth_admin');
    }

    public function authorize($user)
    {
        $this->cookie->set('auth_admin_authorized', true);
        $this->cookie->set('auth_admin', $user);
    }

    public function unAuthorize()
    {
        $this->cookie->delete('auth_admin_authorized');
        $this->cookie->delete('auth_admin');
    }

    public function salt()
    {
        return (string) rand(10000000, 99999999);
    }

    public function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt);
    }
}