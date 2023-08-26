<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
   public function up(): void
   {
       Schema::create('events', function (Blueprint $table) {
           $table->id();
           $table->string('event_type')->default('Photoshooting');
           $table->date('date');
           $table->string('place');
           $table->foreignId('photographer_id');
           $table->foreignId('user_id');
       });
   }

   /**
    * Reverse the migrations.
    */
   public function down()
   {
       Schema::table('events', function (Blueprint $table) {
       $table->dropForeign("user_id");
       $table->dropForeign("photographer_id");
   });
}
};
