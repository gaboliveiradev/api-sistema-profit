<?php

namespace App\Domains\Plan;

interface PriceDomain
{
    public const FREQUENCY_ID_MONTHLY = 1;
    public const FREQUENCY_ID_BIMONTHLY = 2;
    public const FREQUENCY_ID_QUARTERLY = 3;
    public const FREQUENCY_ID_SEMESTER = 4;
    public const FREQUENCY_ID_YEARLY = 5;
}