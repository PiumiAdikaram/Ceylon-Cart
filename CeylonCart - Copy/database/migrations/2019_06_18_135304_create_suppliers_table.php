<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplierId');
            $table->string('farmName');
            $table->string('name');
            $table->string('nic');
            $table->string('phoneNo');
            $table->string('email');
            $table->string('accountNo');
            $table->string('farmRegNo');
            $table->string('address');
            $table->string('homeTown');
            $table->string('location')->nullable();
            $table->integer('rating')->nullable();
            $table->string('imageName');
            $table->binary('image');
            $table->string('supplier_description');
           /*  $table->string('description'); */
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
