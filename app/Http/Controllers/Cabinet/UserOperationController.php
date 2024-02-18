<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\UserOperation;
use App\Services\Interfaces\UserOperationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOperationController extends Controller
{
    public function __construct(
        private UserOperationInterface $userOperationService
    ) {}

    public function index(Request $request)
    {
        $operations = $this->userOperationService->getOperationsByUserId(Auth::user()->id, UserOperation::PAGINATE_PER_PAGE, $request->input('search') ?? '');

        return view('cabinet.operations')->with([
            'operations' => $operations
        ]);
    }
}
