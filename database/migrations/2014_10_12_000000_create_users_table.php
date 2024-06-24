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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('timezone')->default('Asia\Dubai');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');



            $table->rememberToken();
            $table->foreignId('current_account_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();


            $table->string('mobile_number')->nullable();

            $table->boolean('email_sub_payment_subscriptions')->default(true);
            $table->boolean('email_sub_security')->default(true);
            $table->boolean('email_sub_offers_events')->default(true);
            $table->boolean('email_sub_notification')->default(true);
            $table->string('unsubscribe_token')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
