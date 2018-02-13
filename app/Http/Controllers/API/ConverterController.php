<?php

namespace App\Http\Controllers\API;

use App\Models\ExchangeRate;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ConvertRequest;

/**
 * Class ConverterController
 *
 * @package App\Http\Controllers\API
 */
class ConverterController extends Controller
{
    /**
     * @var \App\Models\ExchangeRate
     */
    private $exchangeRate;

    /**
     * ConverterController constructor.
     *
     * @param \App\Models\ExchangeRate $exchangeRate
     */
    public function __construct(ExchangeRate $exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Convert currency.
     *
     * @param \App\Http\Requests\API\ConvertRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function convert(ConvertRequest $request)
    {
        $exchangeRate = $this
            ->exchangeRate
            ->where([
                'from_currency_id' => $request->get('from_currency_id'),
                'to_currency_id' => $request->get('to_currency_id'),
            ])
            ->first();

        return response()->json(['data' => $exchangeRate->amount * $request->get('amount')]);
    }
}
