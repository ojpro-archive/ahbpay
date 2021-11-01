<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search') && !empty($request->search)) {

            $users = User::select('name', 'email', 'phone', 'avatar', 'country', 'max_transactions', 'max_transaction_amount')
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('country', 'like', '%' . $request->search . '%')
                ->orWhere('seller', 'like', '%' . $request->search . '%')
                ->orWhere('seller_ar', 'like', '%' . $request->search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $users = User::select('name', 'email', 'phone', 'avatar', 'country', 'max_transactions', 'max_transaction_amount')->latest()->paginate(10);
        }
        return view('dashboard', compact('users'));
    }

    public function transactions()
    {
        $transactions = Transaction::paginate(20);

        return view('components.admin.transactions')->with([
            'transactions' => $transactions
        ]);
    }
    public function transactor($id, $action)
    {
        $transaction = Transaction::findOrFail($id);
        $to = User::where('id', $transaction->to_user)->first();
        $from_user = User::where('id', $transaction->from_user)->first();

        if ($action == 'accept') {
            $from_user->balance -= $transaction->amount;
            $to->balance += $transaction->amount;
            $transaction->validated = true;

            $from_user->update();
            $to->update();
            $transaction->update();
        } else {

            $transaction->delete();
        }
        return redirect()->back();
    }
}
