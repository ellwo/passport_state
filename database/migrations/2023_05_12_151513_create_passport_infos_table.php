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
        Schema::create('passport_infos', function (Blueprint $table) {
            $table->id();
            $table->string('pass_num')->unique();
            $table->text('name');
            $table->text('phone')->nullable();
            $table->date('birthday');
            $table->boolean('state')->default(false);
            $table->text('state_info')->nullable();
            $table->text('office_name')->nullable();
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
        Schema::dropIfExists('passport_infos');
    }
};
