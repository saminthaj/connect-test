<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people_id');
            $table->unsignedBigInteger('company_id');
            $table->date('join_date');
            $table->date('resign_date');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_employees');
    }
}
