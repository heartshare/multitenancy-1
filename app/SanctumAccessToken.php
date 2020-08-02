<?php

namespace App;

use Laravel\Sanctum\PersonalAccessToken;
class SanctumAccessToken extends PersonalAccessToken
{
    protected $table='personal_access_tokens';
}
