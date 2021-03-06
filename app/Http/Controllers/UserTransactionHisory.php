<?php

namespace App\Http\Controllers;

use App\Models\All_transaction;
use App\Models\ClickTransaction;
use App\Models\PaynetTransaction;
use App\Models\UserExpense;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class UserTransactionHisory extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTransactions (): JsonResponse
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        switch ($_GET['method']) {
            case 'Click':
                $transactionMethod = ClickTransaction::query()->where(['user_id' => $user->id]);
                break;
            case 'Payme':
                $transactionMethod = All_transaction::query()->where(['user_id' => $user->id]);
                break;
            case 'Paynet':
                $transactionMethod = PaynetTransaction::query()->where(['transactionable_id' => $user->id]);
                break;
            case 'Expense':
                $transactionMethod = UserExpense::query()->where(['user_id' => $user->id]);
                break;
        }
        $now = Carbon::now();
        if (array_key_exists('period', $_GET)){
            switch ($_GET['period']) {
                case 'month':
                    $filter = $now->subMonth();
                    break;
                case 'week':
                    $filter = $now->subWeek();
                    break;
                case 'year':
                    $filter = $now->subYear();
                    break;
            }
            $transactions = $transactionMethod->where('created_at', '>', $filter)->get();
        } else {
            $from = $_GET['from_date'];
            $to = $_GET['to_date'];
            $transactions = $transactionMethod->where('created_at', '>', $from)
                ->where('created_at', '<', $to)->get();
        }

        $data = [];
        foreach ($transactions as $transaction) {
            $amount = $transaction->amount;
            $created_at = $transaction->created_at;
            $date = new Carbon($created_at);
            array_push($data, ['amount' => $amount, 'created_at' => $date->toDateTimeString()]);
        }
        return response()->json([
            'transactions' => $data,
        ]);
    }
}
