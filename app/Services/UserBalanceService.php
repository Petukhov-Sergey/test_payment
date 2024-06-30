<?php

namespace App\Services;

use App\Models\User;
use App\Models\Payment;
use App\Models\Payout;

class UserBalanceService
{
    public function credit(User $user, $amount)
    {
        $user->balance += $amount;
        $user->save();

        Payment::create([
            'user_id' => $user->id,
            'amount' => $amount,
        ]);

        return $user->balance;
    }

    public function debit(User $user, $amount)
    {
        if ($user->balance < $amount) {
            throw new \Exception('Insufficient balance');
        }

        $user->balance -= $amount;
        $user->save();

        Payout::create([
            'user_id' => $user->id,
            'amount' => $amount,
        ]);

        return $user->balance;
    }
}
