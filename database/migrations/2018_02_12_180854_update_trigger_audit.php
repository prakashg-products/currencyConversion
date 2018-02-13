<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class UpdateTriggerAudit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE TRIGGER `countries_update_trigger` after update ON `countries` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'countries',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"name\":\"', OLD.name, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"currency_id\":\"', OLD.currency_id, '\", \"code\":\"', "
            . "OLD.code, '\", \"alias\":\"', OLD.alias, '\"}'),"

            ."CONCAT('{\"id\":\"', NEW.id, '\",\"name\":\"', NEW.name, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\", \"currency_id\":\"', NEW.currency_id, '\", \"code\":\"', "
            ."NEW.code, '\", \"alias\":\"', NEW.alias, '\"}'),"

            ."'update') "
        );

        DB::unprepared(
            "CREATE TRIGGER `currencies_update_trigger` after update ON `currencies` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'currencies',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"name\":\"', OLD.name, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"code\":\"', "
            . "OLD.code, '\", \"alias\":\"', OLD.alias, '\"}'),"

            ."CONCAT('{\"id\":\"', NEW.id, '\",\"name\":\"', NEW.name, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\"code\":\"', "
            ."NEW.code, '\", \"alias\":\"', NEW.alias, '\"}'),"

            ."'update') "
        );

        DB::unprepared(
            "CREATE TRIGGER `users_update_trigger` after update ON `users` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'users',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"name\":\"', OLD.name, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"email\":\"', OLD.email, '\", \"password\":\"', "
            . "OLD.password, '\", \"remember_token\":\"', OLD.remember_token, '\"}'),"

            ."CONCAT('{\"id\":\"', NEW.id, '\",\"name\":\"', NEW.name, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\", \"email\":\"', NEW.email, '\", \"password\":\"', "
            ."NEW.password, '\", \"remember_token\":\"', NEW.remember_token, '\"}'),"

            ."'update') "
        );

        DB::unprepared(
            "CREATE TRIGGER `exchange_rates_update_trigger` after update ON `exchange_rates` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'exchange_rates',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"from_currency_id\":\"', OLD.from_currency_id, '\", \"to_currency_id\":\"', "
            . "OLD.to_currency_id, '\", \"amount\":\"', OLD.amount, '\"}'),"

            ."CONCAT('{\"id\":\"', NEW.id, '\",\"updated_at\":\"', NEW.updated_at, '\", "
            ."\"created_at\":\"', NEW.created_at, '\", \"from_currency_id\":\"', NEW.from_currency_id, '\", \"to_currency_id\":\"', "
            ."NEW.to_currency_id, '\", \"amount\":\"', NEW.amount, '\"}'),"

            ."'update') "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `countries_update_trigger`');
        DB::unprepared('DROP TRIGGER `currencies_update_trigger`');
        DB::unprepared('DROP TRIGGER `users_update_trigger`');
        DB::unprepared('DROP TRIGGER `exchange_rates_update_trigger`');
    }
}
