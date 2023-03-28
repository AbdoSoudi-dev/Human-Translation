<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum("method",["paypal","wise","skrill"]);
            $table->bigInteger("invoice_id");
            $table->string("email");
            $table->string("status");
            $table->string("payment_id")->nullable();
            $table->string("payer_id")->nullable();
            $table->string("image")->nullable();
            $table->float("amount");
            $table->foreignId("user_id")->constrained();
            $table->foreignId("order_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
