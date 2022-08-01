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
        Schema::create('sales', function (Blueprint $table) {
            $table->increments("id_sale");
            $table->string("name_client");
            $table->string("email_client");
            $table->string("cpf_client");
            $table->integer("product_id")->unsigned();
            $table->foreign("product_id")->references("id_product")->on("products")->onDelete('cascade');
            $table->dateTime('date_sale');
            $table->integer("quantity_sale");
            $table->integer("discounts_sale");
            $table->string("status_sale");
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
        Schema::dropIfExists('sales');
    }
};
