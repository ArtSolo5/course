<?php


namespace Engine\Core\Auth;


interface Auth
{
    public function authorize($user);
    public function unAuthorize();
    public function hashUser();
}