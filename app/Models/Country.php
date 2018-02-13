<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @package App\Models
 */
class Country extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * A Country has one currency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
