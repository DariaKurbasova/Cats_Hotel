<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // ToDo Добавить столбцы с типом юзера и пр. инфо
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // ToDo Удалить созданные столбцы
        });
    }
};
