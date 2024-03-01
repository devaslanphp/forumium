<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('feature_image')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->json('banner_youtube_urls')->nullable();
            $table->json('banner_images')->nullable();

            $table->text('long_description')->nullable();
            $table->text('short_description')->nullable();

            $table->json('links')->nullable();

            $table->boolean('is_public');
            $table->boolean('is_paid');
            $table->decimal('monthly_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
