<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTriggerAudit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE TRIGGER `countries_delete_trigger` after delete ON `countries` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'countries',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"name\":\"', OLD.name, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"currency_id\":\"', OLD.currency_id, '\", \"code\":\"', "
            . "OLD.code, '\", \"alias\":\"', OLD.alias, '\"}'),"

            ."'{}', "

            ."'delete') "
        );

        DB::unprepared(
            "CREATE TRIGGER `currencies_delete_trigger` after delete ON `currencies` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'currencies',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"name\":\"', OLD.name, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"code\":\"', "
            . "OLD.code, '\", \"alias\":\"', OLD.alias, '\"}'),"

            ."'{}',"

            ."'delete') "
        );

        DB::unprepared(
            "CREATE TRIGGER `users_delete_trigger` after delete ON `users` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'users',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"name\":\"', OLD.name, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"email\":\"', OLD.email, '\", \"password\":\"', "
            . "OLD.password, '\", \"remember_token\":\"', OLD.remember_token, '\"}'),"

            ."'{}',"

            ."'delete') "
        );

        DB::unprepared(
            "CREATE TRIGGER `exchange_rates_delete_trigger` after delete ON `exchange_rates` FOR EACH ROW "
            ."INSERT INTO audits (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'exchange_rates',"

            ."CONCAT('{\"id\":\"', OLD.id, '\",\"updated_at\":\"', OLD.updated_at, "
            ."'\", \"created_at\":\"', OLD.created_at, '\", \"from_currency_id\":\"', OLD.from_currency_id, '\", \"to_currency_id\":\"', "
            . "OLD.to_currency_id, '\", \"amount\":\"', OLD.amount, '\"}'),"

            ."'{}',"

            ."'delete') "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `countries_delete_trigger`');
        DB::unprepared('DROP TRIGGER `currencies_delete_trigger`');
        DB::unprepared('DROP TRIGGER `users_delete_trigger`');
        DB::unprepared('DROP TRIGGER `exchange_rates_delete_trigger`');
    }
}
