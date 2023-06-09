<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $allowedParams = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request)
    {
        $eleQuery = [];

        foreach ($this->allowedParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eleQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }

            return $eleQuery;
        }
    }
}
