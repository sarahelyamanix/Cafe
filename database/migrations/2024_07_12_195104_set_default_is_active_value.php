<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rollback the change if necessary
            $table->boolean('is_active')->default(true)->change();
        });
    }
    
};
