<?php

namespace App\Support\Auth;

class BasicAuth
{
    public function attempt(string|null $username, string|null $password) : bool
    {
        return  $username !== null &&
                $password !== null &&
                $username === config('sap.sap_api_username') &&
                $password === config('sap.sap_api_password');
    }
}