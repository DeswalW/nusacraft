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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('model_x')->default(0);
            $table->integer('model_y')->default(0);
            $table->integer('model_z')->default(0);
            $table->integer('model_rotation_x')->default(0);
            $table->integer('model_rotation_y')->default(0);
            $table->integer('model_rotation_z')->default(0);
            $table->float('model_scale')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
