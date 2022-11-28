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
        Schema::create('bank_acs', function (Blueprint $table) {
            $table->increments('id'); // primary key with auto increment
            $table->string('acc_owner_id', 20)->nullable(false); // borrower table foreign key
            $table->unsignedBigInteger('acc_no')->nullable(false); // string takes more bytes, unsignedBigInteger takes only 8 bytes and can hold big numbers
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
        Schema::dropIfExists('bank_acs');
    }
};
