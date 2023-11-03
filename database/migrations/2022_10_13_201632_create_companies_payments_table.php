<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('companies_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('seed_id')->nullable()->unsigned();
            $table->foreign('seed_id')->references('id')->on('seeds')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->decimal('total_price');
            $table->longText('agreement');
            $table->date('agreement_date');
            $table->longText('agreement_src')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies_payments');
    }
};
