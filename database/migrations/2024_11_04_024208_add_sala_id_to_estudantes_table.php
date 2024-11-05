<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalaIdToEstudantesTable extends Migration
{
    public function up(): void
    {
        Schema::table('estudantes', function (Blueprint $table) {
            $table->foreignId('sala_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('estudantes', function (Blueprint $table) {
            $table->dropForeign(['sala_id']); 
            $table->dropColumn('sala_id');
        });
    }
}
