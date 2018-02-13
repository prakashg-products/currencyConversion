@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Add Currency</h3></div>
        </div>
        <div class="col-md-12">
            <form class="form-horizontal" id="currency_add_form">
                <div class="col-md-4 form-group">
                    <label for="currency_name">Currency Name</label>
                    <input type="text" id="currency_name" name="currency_name" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <label for="currency_code"> Currency Code</label>
                    <input type="text" id="currency_code" name="currency_code" maxlength="3" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <label for="currency_code">1 (new currency) With Respect To</label>
                    <select type="text" id="wrt" name="wrt" class="form-control" disabled>
                        @foreach($currencies as $currency)
                            <option value="{!! $currency->id !!}" {!! $currency->code == 'USD'?  'selected' : ''!!}>
                                {!! $currency->code  !!} ({!! ($currency->name) !!})</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 form-group">
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" class="form-control"
                           onkeypress="return isNumberKey(event)" maxlength="15">
                </div>
                <div class="col-md-4 form-group">
                    <button type="button" id="save" class="form-control btn btn-primary save">Save</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="col-md-4 form-group">
            <button type="button" id="reset" class="form-control btn btn-primary save">Reset</button>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Currency Lists</h3></div>
            <div class="panel-body">
                <div class="well well-lg">
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Currency Name</th>
                <th>Currency Code</th>
                <th>WRT currency Name</th>
                <th>WRT Currency Code</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody id = "tbody">
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="{!! elixir('js/manage.js') !!}"></script>
@stop
