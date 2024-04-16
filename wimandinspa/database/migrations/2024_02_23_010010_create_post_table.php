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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');            
            $table->string('image_path')->nullable();
            $table->string('image_url')->nullable();
            $table->bigInteger('post_type_id')->unsigned();
            $table->boolean('status')->default(true);
            $table->text('content');
            $table->timestamps();
            $table->foreign('post_type_id')->references('id')->on('post_types');

            #$table->bigInteger('users_id')->unsigned();
            #$table->foreign('users_id')->references('id')->on('users');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
