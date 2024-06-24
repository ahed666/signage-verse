<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('countries');
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country')->unique();
            $table->string('country_code')->unique(); // ISO country code (e.g., AE)
            $table->string('mobile_code'); // Mobile country code (e.g., 00971 or +971)
            $table->timestamps();
        });

        // Insert UAE into the countries table
        DB::table('countries')->insert([
            'country' => 'United Arab Emirates',
            'country_code' => 'AE',
            'mobile_code' => '00971',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
