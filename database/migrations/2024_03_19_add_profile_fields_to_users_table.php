<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable();
            $table->string('full_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('last_education')->nullable();
            $table->string('interests')->nullable();
            $table->text('bio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profile_picture',
                'full_name',
                'phone_number',
                'additional_info',
                'last_education',
                'interests',
                'bio'
            ]);
        });
    }
}; 