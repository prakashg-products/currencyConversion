<?php

namespace App\Http\Controllers\Web;

use App\Models\Currency;
use App\Http\Controllers\Controller;

class ConverterController extends Controller
{
    /**
     * @var \App\Models\Currency
     */
    private $currency;

    /**
     * ConverterController constructor.
     *
     * @param \App\Models\Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $currencies = $this->currency->get();

        return view('converter.index', compact('currencies'));
    }
}
