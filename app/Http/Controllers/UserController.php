<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Models\User;
use App\Services\UserBalanceService;

class UserController extends Controller
{
    protected $userBalanceService;

    public function __construct(UserBalanceService $userBalanceService)
    {
        $this->userBalanceService = $userBalanceService;
    }

    public function credit(BalanceRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validated = $request->validated();
        $amount = $validated['amount'];
        $balance = $this->userBalanceService->credit($user, $amount);

        return response()->json(['message' => 'Amount credited successfully', 'balance' => $balance]);
    }

    public function debit(BalanceRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validated = $request->validated();
        $amount = $validated['amount'];

        try {
            $balance = $this->userBalanceService->debit($user, $amount);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json(['message' => 'Amount debited successfully', 'balance' => $balance]);
    }
}
