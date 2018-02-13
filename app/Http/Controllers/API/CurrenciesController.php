<?php

namespace App\Http\Controllers\API;

use App\Models\Currency;
use App\Models\ExchangeRate;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\CurrencyRequest;

/**
 * Class CurrenciesController
 *
 * @package App\Http\Controllers\API
 */
class CurrenciesController extends Controller
{
    /**
     * @var \App\Models\ExchangeRate
     */
    private $exchangeRate;
    /**
     * @var \App\Models\Currency
     */
    private $currency;

    /**
     * CurrenciesController constructor.
     *
     * @param \App\Models\ExchangeRate $exchangeRate
     * @param \App\Models\Currency     $currency
     */
    public function __construct(ExchangeRate $exchangeRate, Currency $currency)
    {
        $this->exchangeRate = $exchangeRate;
        $this->currency = $currency;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchangeRates = $this->exchangeRate->with(['fromCurrency', 'toCurrency'])->get();

        return response()->json(['data' => $exchangeRates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\API\CurrencyRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CurrencyRequest $request)
    {
        $data = $request->all();
        $currency = $this->currency->store($data);
        $data['from_currency_id'] = $currency->id;
        $data['to_currency_id'] = $data['wrtid'];

        $exchange = $this->exchangeRate->store($data);

        return response()->json(['data' => $exchange->load(['fromCurrency', 'toCurrency'])]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function reset()
    {
        ExchangeRate::truncate();

        $this->currency->where('id', "<>", 1)->delete();

        return response()->json(["data" => "Done"]);
    }
}
