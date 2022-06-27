<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $oTable) {
            $oTable->id('event_id');
            $oTable->string('name');
            $oTable->string('description');
            $oTable->string('held_on_date');
            $oTable->string('fee');
            $oTable->string('featured_image_url');
            $oTable->boolean('is_done')->default(false);
            $oTable->boolean('is_active')->default(true);
            $oTable->unsignedBigInteger('added_by');
            $oTable->timestamps();

            $oTable->foreign('added_by')
                ->on('users')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
