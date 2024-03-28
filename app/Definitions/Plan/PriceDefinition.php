<?php

namespace App\Definitions\Plan;

interface PriceDefinition
{
    public const FREQUENCY_NAME_MONTHLY = 'Mensal';
    public const FREQUENCY_NAME_BIMONTHLY = 'Bimestral';
    public const FREQUENCY_NAME_QUARTERLY = 'Trimestral';
    public const FREQUENCY_NAME_SEMESTER = 'Semestral';
    public const FREQUENCY_NAME_YEARLY = 'Anual';
}