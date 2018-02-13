<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 *
 * @package App\Models
 */
class Currency extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * A currency has one conutry.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function country()
    {
        return $this->hasMany(Country::class);
    }

    /**
     * Currency has man From exchange rate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeFrom()
    {
        return $this->hasMany(ExchangeRate::class, 'from_currency_id', 'id');
    }

    /**
     * Currency has man to exchange rate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeTo()
    {
        return $this->hasMany(ExchangeRate::class, 'to_currency_id', 'id');
    }

    /**
     * @param array $data
     *
     * @return \App\Models\Currency
     */
    public function store(array $data): Currency
    {
        return $this->create([
            'name' => $data['name'],
            'code' => $data['code'],
            'alias' => str_slug($data['name'], '_'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
