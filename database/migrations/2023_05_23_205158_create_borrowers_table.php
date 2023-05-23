<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->float('annual_salary')->nullable();
            /* Bank accounts could be a separate table depending on requirements
            but for the purposes of this exercise I just added it as a field to keep it simple.*/
            $table->float('total_bank_balance')->nullable();
            $table->unsignedBigInteger('loan_application_id');

            $table->foreign('loan_application_id')
                ->references('id')
                ->on('loan_applications')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}