<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class PeopleFilter extends ApiFilter
{
    protected $allowedParams = [
        'lastName' => ['eq'],
        'firstName' => ['eq'],
        'city' => ['eq'],
        'mobileNumber' => ['eq']
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code',
        'firstName' => 'first_name',
        'lastName' => 'last_name'
    ];

    protected $operatorMap = [
        'eq' => '='
    ];
}
