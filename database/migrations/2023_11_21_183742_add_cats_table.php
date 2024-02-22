<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('sex', ['F', 'M']);
            $table->string('breed');
            $table->date('birthday');
            $table->boolean('is_sterilised');
            $table->date('vaccine_active_till');
            $table->text('feeding_info');
            $table->text('communication_info');
            $table->text('more_info');
            $table->text('comment');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
