<?php

namespace App\Models;

use App\Helpers\PriceHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBalanсe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount'];

    public function getAmountFormattedAttribute() : string
    {
        return PriceHelper::format($this->amount);
    }
}
