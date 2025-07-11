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
        Schema::create('task_attachment', function (Blueprint $table) {
            $table->id('attachment_id')->primary();
            $table->longText('details_attachment');
            $table->string('details_status');
            $table->uuid('task_id');

            $table->foreign('task_id')->references('task_id')->on('task_information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('details_information', function (Blueprint $table) {
            //
        });
    }
};
