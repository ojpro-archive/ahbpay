<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\GenerateSerial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user_id = Auth::id();

        $transactions = Transaction::select(['id', 'from_user', 'to_user', 'amount'])
            ->where('from_user', $current_user_id)
            ->orWhere('to_user', $current_user_id)->limit(8)->latest()->get();

        return view('pages.transacrions')->with(['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $to_user = '';
        $amount = 0;
        if ($request->type == 'withdraw') {

            $validated = $request->validate([
                'withdraw_amount' => 'numeric|required|min:1',
                'withdraw_to_iban' => 'required|exists:cards,iban',
                'type' => 'required'
            ]);

            if (Auth::user()->balance < $request->send_amount) {
                return redirect()->back();
            }
            $user_id_by_iban = Card::select('owner')->where('iban', $request->withdraw_to_iban)->first();

            $to_user = $user_id_by_iban->owner;

            $amount = $request->withdraw_amount;
        } else if ($request->type == 'send') {
            $validated = $request->validate([
                'send_amount' => 'numeric|required|min:1',
                'send_to_account' => 'required|exists:users,uuid|numeric',
                'type' => 'required'
            ]);
            if (Auth::user()->balance < $request->send_amount) {
                return redirect()->back();
            }

            $user_id_by_uuid = User::select('id')->where('uuid', $request->send_to_account)->first();

            $to_user = $user_id_by_uuid->id;

            $amount = $request->send_amount;
        } else {

            $validated = $request->validate([
                'disposit_amount' => 'numeric|required|min:1',
                'type' => 'required|in:disposit'
            ]);

            $incress = User::where('id', Auth::id())->increment('balance', $request->disposit_amount);

            return redirect()->back();
        }

        $serial = GenerateSerial::generateSerailNumber();

        Transaction::create([
            'serial' => $serial,
            'type' => $request->type,
            'from_user' => Auth::id(),
            'to_user' => $to_user,
            'amount' => $amount
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function send($to, $amount)
    {
        $to_user = User::where('uuid', $to)->firstOrFail();
        if (Auth::user()->balance < $amount) {
            return abort(404);
        }

        Transaction::create([
            'serial' =>  GenerateSerial::generateSerailNumber(),
            'type' => 'send',
            'from_user' => Auth::id(),
            'to_user' => $to_user->id,
            'amount' => $amount
        ]);
        return redirect()->route('transactions.index');
    }
}
