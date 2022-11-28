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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->string('id', 20)->nullable(false); // primary key but did not work on any DB constraints.
            $table->string('b_name', 100)->nullable(false); // Alphanumeric, borrower's name
            $table->boolean('is_employed')->nullable()->default(0); // check if has a job
            $table->boolean('has_bank')->nullable()->default(0); // check if has a job
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
        Schema::dropIfExists('borrowers');
    }
};
