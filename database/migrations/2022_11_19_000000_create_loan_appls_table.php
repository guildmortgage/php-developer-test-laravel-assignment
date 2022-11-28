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
        Schema::create('loan_appls', function (Blueprint $table) {
            $table->increments('id'); // primary key with auto increment
            $table->string('loan_appl_id', 20)->nullable(false); // Application id, can be used for composite index
            $table->string('user_id', 20)->nullable(false); // Borrower's id, foreign key from borrower table 'id' field 
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
        Schema::dropIfExists('loan_appls');
    }
};
