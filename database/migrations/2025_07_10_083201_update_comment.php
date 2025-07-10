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
        Schema::table('comment_list', function (Blueprint $table) {
            if (!Schema::hasColumn('comment_list', 'task_id')) {
                $table->uuid('task_id')->after('comment_attachment');
            }
        });
    }

    public function down(): void
    {
        Schema::table('comment_list', function (Blueprint $table) {
            if (Schema::hasColumn('comment_list', 'task_id')) {
                $table->dropColumn('task_id');
            }
        });
    }
};
