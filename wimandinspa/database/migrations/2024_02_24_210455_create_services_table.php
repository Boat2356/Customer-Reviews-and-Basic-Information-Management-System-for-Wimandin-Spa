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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);            
            $table->string('duration');    
            $table->string('image_path')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('status')->default(true);
            $table->bigInteger('service_type_id')->unsigned();
            $table->timestamps();
            $table->foreign('service_type_id')->references('id')->on('service_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
