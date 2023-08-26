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
        Schema::table('photographer', function (Blueprint $table) {
            $table->string("equipment");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('photographer', 'equipment'))
        {
            Schema::table('photographer', function (Blueprint $table)
            {
                $table->dropColumn('equipment');
            });
        }
    }
};
