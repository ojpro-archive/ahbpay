<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all(['account_number', 'id', 'expiration', 'cvv']);
        $bg_classes = ['', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-dark'];
        return view('pages.cards')->with(['cards' => $cards, 'bg_classes' => $bg_classes]);
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
        $request->validate(
            [
                'owner' => '',
                'holder_name' => '',
                'account_number' => 'required|max:16',
                'iban' => '',
                'cvv' => 'required|numeric',
                'balance' => '',
                'exp_month' => 'required',
                'exp_year' => 'required',
                'bank_name' => ''
            ]
        );

        $card = Card::create([
            'owner' => Auth::id(),
            'holder_name' => '',
            'account_number' => str_replace(' ', '', $request->account_number),
            'iban' => '',
            'cvv' => $request->cvv,
            'balance' => random_int(1, 10000),
            'expiration' => $request->exp_month . ' / ' . $request->exp_year,
            'bank_name' => ''
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
