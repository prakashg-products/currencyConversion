<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Currency;

/**
 * Class ManageController
 *
 * @package App\Http\Controllers\Web
 */
class ManageController extends Controller
{
    /**
     * @var \App\Models\Currency
     */
    private $currency;

    /**
     * ManageController constructor.
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

        return view('manage.index', compact('currencies'));
    }
}
