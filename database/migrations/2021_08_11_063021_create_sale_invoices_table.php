<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->unsignedInteger('qty')->nullable();
            $table->string('value')->nullable();
            $table->decimal('total')->nullable();
//            $table->string('customer_name')->unique();
            $table->foreignId('customer_name')->references('id')->on('customers');
//            $table->string('prod_name');
            $table->foreignId('prod_name')->references('id')->on('products');
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
        Schema::dropIfExists('sale_invoices');
    }
}
