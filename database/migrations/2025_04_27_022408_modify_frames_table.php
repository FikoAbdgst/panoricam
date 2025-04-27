<?php
// Migration to modify frames table (add category_id and remove is_active)
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('frames', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->dropColumn('is_active');
        });
    }

    public function down()
    {
        Schema::table('frames', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
