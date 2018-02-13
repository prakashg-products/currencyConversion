<?php

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CurrencyDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Currency::truncate();
        Currency::insert([
            'name' => 'United State Dollar',
            'code' => 'USD',
            'alias' => str_slug('United State Dollar', '_'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
