<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyBalanceRecords extends Model
{
    protected $primaryKey = 'client_id';
    public $timestamps = false;
}
