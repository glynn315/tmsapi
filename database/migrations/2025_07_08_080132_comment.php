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
        Schema::create('comment_list', function (Blueprint $table) {
            $table->uuid('comment_id')->primary();
            $table->string('comment_description');
            $table->longText('comment_attachment')->nullable();
            $table->string('task_id');
            $table->string('comment_status');
            $table->timestamps();

            $table->foreign('task_id')->references('task_id')->on('task_information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comment_list', function (Blueprint $table) {
            //
        });
    }
};
