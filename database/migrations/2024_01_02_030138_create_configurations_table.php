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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->string('nama_web', 255)->nullable();
            $table->string('nama_singkat', 255)->nullable();
            $table->string('tagline', 255)->nullable();
            $table->string('tagline_2', 255)->nullable();
            $table->text('tentang')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('website', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon', 50)->nullable();
            $table->string('hp', 50)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->text('meta_text')->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('nama_facebook', 255)->nullable();
            $table->string('nama_twitter', 255)->nullable();
            $table->string('nama_instagram', 255)->nullable();
            $table->text('google_map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
