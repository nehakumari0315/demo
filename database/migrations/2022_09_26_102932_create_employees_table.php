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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('father')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('local_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('date')->nullable();
            $table->string('salary')->nullable();
            $table->string('account')->nullable();
            $table->string('bank')->nullable();
            $table->string('ifcscode')->nullable();
            $table->string('pan_code')->nullable();
            $table->string('branch')->nullable();
            $table->string('resume')->nullable();
            $table->string('offer_letter')->nullable();
            $table->string('joining_letter')->nullable();
            $table->string('agreement_letter')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
