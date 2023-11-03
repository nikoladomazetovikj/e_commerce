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
        DB::unprepared('
            CREATE OR REPLACE FUNCTION update_seed_quantity()
            RETURNS TRIGGER AS $$
            BEGIN
                UPDATE seeds
                SET quantity = quantity - NEW.quantity
                WHERE id = NEW.seed_id;
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER QuantityUpdate
            AFTER INSERT
            ON online_payments
            FOR EACH ROW
            EXECUTE FUNCTION update_seed_quantity();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS QuantityUpdate ON online_payments;');
        DB::unprepared('DROP FUNCTION IF EXISTS update_seed_quantity();');
    }
};
