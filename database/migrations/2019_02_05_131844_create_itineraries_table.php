<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('username')->nullable();
            $table->string('itinerary_reference')->unique();
            $table->integer('total_fare')->nullable();
            $table->integer('total_tax')->nullable();
            $table->integer('total_price')->nullable();
            $table->tinyInteger('status')->default(0)->comment("0:New; 1:Quoted; 2:Paid; 3:Booked; 4:Timeline");;
            $table->boolean('is_delete')->default(0)->comment("0:Not Deleted; 1:Deleted");
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
        Schema::dropIfExists('itineraries');
    }
}
