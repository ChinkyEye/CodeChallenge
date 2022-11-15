<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_vacations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auther');
            $table->foreign('auther')->references('id')->on('users');
            $table->integer('status')->default(0); // 0 for pending ,1 for approved, 2 for reject
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('resolved_by');
            $table->foreign('resolved_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
            $table->dateTime('request_created_at');
            $table->dateTime('vacation_start_date');
            $table->dateTime('vacation_end_date');
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
        Schema::dropIfExists('user_has_vacations');
    }
}
