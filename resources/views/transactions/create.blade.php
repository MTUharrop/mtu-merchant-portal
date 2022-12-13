@extends('transactions.layout')

@section('content')

<div class="container">
    <h3>Submit a new transaction</h3>
</div>


<div class="row">
    <div class="pull-left">
        <h4>Upload new transaction details</h4><br>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{  route('transactions.index') }}"> Back</a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> Invalid input. <br><br>
        <ul>
            @foreach ($errors->all as $error)
                <li>{{  $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{  route('transactions.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Transaction ID *</strong>
                <input type="text" name="txID" class="form-control" placeholder="Transaction ID"><br><br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Transaction Date *</strong>
                <input type="date" name="txDate" class="form-control datetimepicker" value="" placeholder="Transaction Date"><br><br>
                <script>
                    $(function () {
                        $('.datetimepicker').datetimepicker();
                    });
                </script>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Method *</strong>
                <input type="radio" id="cash" name="txPayMethod" class="form-control" value="Cash" placeholder="Transaction Payment Method">
                <label for="cash">Cash</label>
                <input type="radio" id="cheque" name="txPayMethod" class="form-control" value="Cheque" placeholder="Transaction Payment Method">
                <label for="cash">Cheque</label>
                <input type="radio" id="credit" name="txPayMethod" class="form-control" value="Credit" placeholder="Transaction Payment Method">
                <label for="cash">Credit Card</label>
                <input type="radio" id="debit" name="txPayMethod" class="form-control" value="Debit" placeholder="Transaction Payment Method">
                <label for="cash">Debit Card</label><br><br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer Email *</strong>
                <input type="email" name="txCustEmail" class="form-control" placeholder="Customer Email"><br><br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comments *</strong>
                <textarea class="form-control" style="height: 100px" name="txComments" placeholder="Transaction Comments"></textarea><br><br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div> 

</form>

@endsection