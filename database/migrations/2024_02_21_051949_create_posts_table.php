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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title' ,191);
            $table->string('slug' ,191);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->mediumText('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->enum('status' ,['publish' , 'draft'])->default('publish');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
