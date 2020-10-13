<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesRecord extends Model
{
    protected $primaryKey = 'expenses_records_id';
    public $timestamps = false;
}
