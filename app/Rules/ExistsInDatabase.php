<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistsInDatabase implements Rule
{
    protected $table;
    protected $column;

    public function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        $result = DB::table($this->table)
            ->where($this->column, $value)
            ->exists();

        return $result;
    }

    public function message()
    {
        return 'The selected :attribute does not exist in the database.';
    }
}
