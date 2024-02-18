<?php

namespace App\Models;

use App\Helpers\PriceHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOperation extends Model
{
    use HasFactory;

    const PAGINATE_PER_PAGE = 10;
    const LAST_OPERATIONS_LIMIT = 5;

    protected $fillable = ['user_id', 'amount', 'description'];

    protected $appends = ['amount_formatted', 'created_at_formatted'];

    public function getAmountFormattedAttribute() : string
    {
        return PriceHelper::format($this->amount);
    }

    public function getCreatedAtFormattedAttribute() : string
    {
        return $this->created_at->format('d.m.Y H:i');
    }
}
