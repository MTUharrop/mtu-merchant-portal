<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $this->middleware('auth');
        $transactions = Transaction::latest()->paginate(10);

        return view('transactions.index', compact('transactions'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->middleware('auth');
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the input
        $request->validate([
            'txID' => 'required|alpha_num|starts_with:TX|max:16|unique:transactions,txID',
            'txDate' => 'required',
            'txPayMethod' => 'required',
            'txCustEmail' => 'required|email',
            'txComments' => 'required'
        ]);

        //create a new transaction
        $this->middleware('auth');
        Transaction::create($request->all());

        //redirect the user and send message
        return redirect()->route('transactions.index')->with('success','Transaction saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $this->middleware('auth');
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $this->middleware('auth');
        return view('transactions.edit', compact('transaction'));
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
        $request->validate([
            'txID' => 'required|alpha_num|starts_with:TX|max:16',
            'txDate' => 'required',
            'txPayMethod' => 'required',
            'txCustEmail' => 'required|email',
            'txComments' => 'required'
        ]);

        //create a new transaction
        $this->middleware('auth');
        $transaction->update($request->all());

        //redirect the user and send message
        return redirect()->route('transactions.index')->with('success','Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //delete the transaction
        $this->middleware('auth');
        $transaction->delete();

        //redirect the user and display success message 
        return redirect()->route('transactions.index')->with('success','Transaction deleted successfully');
    }
}
