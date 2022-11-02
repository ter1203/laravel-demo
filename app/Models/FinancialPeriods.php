<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPeriods extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'name', 'start_date', 'end_date', 'weeks'];
}
