<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); 
            $table->string('favicon')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->string('whatsapp')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('site_title')->nullable(); 
            $table->string('address')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('twitter')->nullable(); 
            $table->string('linkedin')->nullable(); 
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
};
