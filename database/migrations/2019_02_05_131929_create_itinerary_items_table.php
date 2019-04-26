<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItineraryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('itinerary_id');
            $table->integer('admin_id');
            $table->string('passenger')->nullable();
            $table->string('notes')->nullable();
            $table->integer('cost');
            $table->string('reference_image')->nullable();
            $table->integer('team_cost');
            $table->string('holding_reference')->nullable();
            $table->string('booking_reference')->nullable();
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
        Schema::dropIfExists('itinerary_items');
    }
}
