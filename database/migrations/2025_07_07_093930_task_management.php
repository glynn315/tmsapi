<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_information', function (Blueprint $table) {
            $table->uuid('task_id')->primary();
            $table->string('task_label');
            $table->string('task_description');
            $table->string('task_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taskinformation', function (Blueprint $table) {
            //
        });
    }
};
