<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');

            $table->string('last_name')->nullable();

            $table->string('mobile')->nullable();

            $table->string('email')->nullable();

            $table->string('gender')->nullable();

            $table->date('date_of_birthday')->nullable();

            $table->longText('address')->nullable();

            $table->longText('description')->nullable();

            $table->string('reference_number')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
