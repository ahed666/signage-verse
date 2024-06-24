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
        // Find the ID of the UAE in the countries table
        $uaeId = DB::table('countries')->where('country_code', 'AE')->value('id');

        Schema::create('cities', function (Blueprint $table) use ($uaeId) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->default($uaeId);
            $table->string('city');



            $table->timestamps();
        });

        // Insert cities for the UAE into the cities table
        DB::table('cities')->insert([
            ['country_id' => $uaeId, 'city' => 'Dubai'],
            ['country_id' => $uaeId, 'city' => 'Abu Dhabi'],
            ['country_id' => $uaeId, 'city' => 'Sharjah'],
            ['country_id' => $uaeId, 'city' => 'Ajman'],
            ['country_id' => $uaeId, 'city' => 'Al Ain'],
            ['country_id' => $uaeId, 'city' => 'umm Al Quwain'],
            ['country_id' => $uaeId, 'city' => 'Ras Al Khaimah'],
            ['country_id' => $uaeId, 'city' => 'Fujairah'],
            // Add more cities as needed
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
