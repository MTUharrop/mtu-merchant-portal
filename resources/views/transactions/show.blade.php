@extends('transactions.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Show Transactions</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{  route('transaction.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Index:</strong>
            {{ $transaction->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Transaction ID:</strong>
            {{ $transaction->txID }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Transaction Date:</strong>
            {{ $transaction->txDate }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Payment Method:</strong>
            {{ $transaction->txPayMethod }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Email:</strong>
            {{ $transaction->txCustEmail }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Comments:</strong>
            {{ $transaction->txComments }}
        </div>
    </div>
</div>

@endsection