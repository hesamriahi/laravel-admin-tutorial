<?php

use App\Models\Post;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_category_id')->constrained()->cascadeOnDelete();
            $table->string('title')->index();
            $table->enum('status', Post::getAvailableStatuses());
            $table->string('slug');
            $table->text('summary')->nullable();
            $table->longText('body');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('posts');
    }
};
