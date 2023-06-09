<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->string('type');
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
    public function login()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('Email address');
            $table->string('Password');
            $table->timestamps();
        });
    }

    public function yo()
    {
        Schema::dropIfExists('vehicles');
    }
}