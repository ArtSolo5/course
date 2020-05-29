<?php


namespace Engine\Core\Auth;


use Engine\Helper\Cookie;

class AuthClient implements Auth
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
        return $this->cookie->get('auth_client');
    }

    public function authorize($user)
    {
        $this->cookie->set('auth_client_authorized', true);
        $this->cookie->set('auth_client', $user);
    }

    public function unAuthorize()
    {
        $this->cookie->delete('auth_client_authorized');
        $this->cookie->delete('auth_client');
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