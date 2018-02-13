<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExchangeRate
 *
 * @package App\Models
 */
class ExchangeRate extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * From currency belongs to a currency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class, 'from_currency_id', 'id');
    }

    /**
     * To currency belongs to a currency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, 'to_currency_id', 'id');
    }

    /**
     * @param array $data
     *
     * @return \App\Models\ExchangeRate
     */
    public function store(array $data): ExchangeRate
    {
        return $this->create([
            'from_currency_id' => $data['from_currency_id'],
            'to_currency_id' => $data['to_currency_id'],
            'amount' => $data['amount'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
