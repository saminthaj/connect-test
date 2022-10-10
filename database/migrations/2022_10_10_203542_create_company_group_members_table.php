<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyGroupMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_group_members', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('company_group_id');

            $table->foreign('company_group_id')->references('id')->on('company_groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('company_employees')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_group_members');
    }
}
