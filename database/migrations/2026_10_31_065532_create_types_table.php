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
        
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::table('medicines', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        
        Schema::table('medicines', function (Blueprint $table) {
            $table->foreignId('type_id')->constrained();
        });
    }

   
    public function down(): void
    {
       
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropConstrainedForeignId('type_id');
        });

        Schema::table('medicines', function (Blueprint $table) {
            $table->string('type');
        });

        Schema::dropIfExists('types');
    }
};