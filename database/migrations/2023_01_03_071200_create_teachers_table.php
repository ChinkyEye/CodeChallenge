<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->string('phone_no');
            $table->string('pan_no');
            $table->string('citizenship_no');
            $table->integer('is_certified')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('resolved_by');
            $table->foreign('resolved_by')->references('id')->on('users');
            $table->timestamps();
            $table->index(['is_certified']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
