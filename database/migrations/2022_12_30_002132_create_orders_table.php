<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("project_name");
            $table->string("file_type");
            $table->string("field");
            $table->string("field_type")->nullable();
            $table->string("specialist");
            $table->string("trans_from");
            $table->string("trans_to");
            $table->string("words");
            $table->float("amount");
            $table->string("file");
            $table->date("deliver_at")->nullable();

            $table->bigInteger("project_id");

            $table->integer("percent")->default(0);
            $table->string("translated_file")->nullable();
            $table->string("status")->default("unpaid");

            $table->foreignId("user_id")->nullable()->constrained();
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
        Schema::dropIfExists('orders');
    }
}
