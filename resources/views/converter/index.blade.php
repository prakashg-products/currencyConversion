@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a class="btn btn-success" href="{!! route('manage') !!}">Manage</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal">
                    <div class="col-md-4 form-group">
                        <label for="from_currency">From</label>
                        <select name="from_currency" class="form-control" id="from_currency">
                            @foreach($currencies as $currency)
                                <option value="{!! $currency->id !!}">
                                    {!! $currency->code  !!} ({!! ($currency->name) !!})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="to_currency">To</label>
                        <select name="to_currency" class="form-control" id="to_currency" disabled>
                            @foreach($currencies as $currency)
                                <option value="{!! $currency->id !!}" {!! $currency->code == 'USD'?  'selected' : ''!!}>
                                    {!! $currency->code  !!} ({!! ($currency->name) !!})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="amount">Amount</label>
                        <input type="text" id="amount" class="form-control" name="amount" onkeypress="return isNumberKey
                        (event)"/>
                    </div>
                    <div class="col-md-4 form-group">
                        <button type="button" class="btn btn-primary form-control" id="convert">Convert</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            The Amount is <span class="converted"></span>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! elixir('js/converter.js') !!}"></script>
@stop