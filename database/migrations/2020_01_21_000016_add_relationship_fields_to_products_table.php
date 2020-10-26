<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('provider_id')->nullable();

            $table->foreign('provider_id', 'provider_fk_894838')->references('id')->on('providers');

            $table->unsignedInteger('category_id')->nullable();

            $table->foreign('category_id', 'category_fk_901171')->references('id')->on('product_categories');
        });
    }
}
