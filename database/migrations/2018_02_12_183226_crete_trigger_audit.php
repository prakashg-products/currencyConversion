<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteTriggerAudit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE TRIGGER `countries_create_trigger` after insert ON `countries` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'countries',"
            ."'{}', "
            ."CONCAT('{\"id\":\"', NEW.id, '\",\"name\":\"', NEW.name, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\", \"currency_id\":\"', NEW.currency_id, '\", \"code\":\"', "
            ."NEW.code, '\", \"alias\":\"', NEW.alias, '\"}'),"

            ."'insert') "
        );

        DB::unprepared(
            "CREATE TRIGGER `currencies_create_trigger` after insert ON `currencies` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'currencies',"

            ."'{}',"

            ."CONCAT('{\"id\":\"', NEW.id, '\",\"name\":\"', NEW.name, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\"code\":\"', "
            ."NEW.code, '\", \"alias\":\"', NEW.alias, '\"}'),"

            ."'insert') "
        );

        DB::unprepared(
            "CREATE TRIGGER `users_create_trigger` after insert ON `users` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'users',"

            ."'{}',"

            ."CONCAT('{\"id\":\"', NEW.id, '\",\"name\":\"', NEW.name, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\", \"email\":\"', NEW.email, '\", \"password\":\"', "
            ."NEW.password, '\", \"remember_token\":\"', NEW.remember_token, '\"}'),"

            ."'insert') "
        );

        DB::unprepared(
            "CREATE TRIGGER `exchange_rates_create_trigger` after insert ON `exchange_rates` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'exchange_rates',"

            ."'{}',"

            ."CONCAT('{\"id\":\"', NEW.id, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\", \"from_currency_id\":\"', NEW.from_currency_id, '\", \"to_currency_id\":\"', "
            ."NEW.to_currency_id, '\", \"amount\":\"', NEW.amount, '\"}'),"

            ."'insert') "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `countries_create_trigger`');
        DB::unprepared('DROP TRIGGER `currencies_create_trigger`');
        DB::unprepared('DROP TRIGGER `users_create_trigger`');
        DB::unprepared('DROP TRIGGER `exchange_rates_create_trigger`');
    }
}
