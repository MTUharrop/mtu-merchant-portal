@extends('transactions.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h4>Saved Transactions</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{  route('transactions.create') }}"> Enter new Transaction</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Index</th>
        <th>Transaction ID</th>
        <th>Transaction Date</th>
        <th>Payment Method</th>
        <th>Customer Email</th>
        <th>Comments</th>
        <th width="300px">Action</th>
    </tr>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->txID }}</td>
            <td>{{ $transaction->txDate }}</td>
            <td>{{ $transaction->txPayMethod }}</td>
            <td>{{ $transaction->txCustEmail }}</td>
            <td>{{ $transaction->txComments }}</td>
            <td>
                <form action="{{ route('transactions.destroy',$transaction->txID) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('transactions.show',$transaction->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>        
    @endforeach
</table>
{{ $transactions->links() }}
@endsection