<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(<<<EOF
               CREATE TRIGGER  QuantityUpdate
               AFTER INSERT
               ON online_payments FOR EACH ROW

            BEGIN

            UPDATE seeds
            SET seeds.quantity = seeds.quantity - New.quantity
            WHERE seeds.id = New.seed_id ;

            END
       EOF);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `QuantityUpdate`');
    }
};
