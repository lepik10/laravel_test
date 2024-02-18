<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\UserOperation;
use App\Services\Interfaces\UserBalanceInterface;
use App\Services\Interfaces\UserOperationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBalanceController extends Controller
{
        public function __construct(
            private UserBalanceInterface $userBalanceService,
            private UserOperationInterface $userOperationService
        ) {}

    public
    function index()
    {
        $balance = $this->userBalanceService->getBalanceByUserId(Auth::user()->id);
        $operations = $this->userOperationService->getOperationsByUserIdWithLimit(Auth::user()->id, UserOperation::LAST_OPERATIONS_LIMIT);


        return view('cabinet.balance')->with([
            'balance' => $balance,
            'operations' => $operations
        ]);
    }

    public
    function getUpdateInfo()
    {
        $balance = $this->userBalanceService->getBalanceByUserId(Auth::user()->id);
        $operations = $this->userOperationService->getOperationsByUserIdWithLimit(Auth::user()->id, UserOperation::LAST_OPERATIONS_LIMIT);

        return [
            'balance' => $balance->amount_formatted,
            'operations' => $operations
        ];
    }
}
