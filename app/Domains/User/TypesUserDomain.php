<?php

namespace App\Domains\User;

interface TypesUserDomain
{
    public const TYPE_USER_GYMGOER = 1;
    public const TYPE_USER_PERSONAL = 2;
    public const TYPE_USER_ADMINISTRATOR = 3;
    public const TYPE_USER_DEVELOPER = 4;
}