<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_forms', function (Blueprint $oTable) {
            $oTable->id('event_form_id');
            $oTable->string('form_description')->nullable();
            $oTable->string('form_reply_template')->nullable();
            $oTable->boolean('allow_prc_info')->default(true);
            $oTable->boolean('require_prc_info')->default(true);
            $oTable->boolean('allow_to_follow_payment')->default(true);
            $oTable->boolean('allow_multiple_registrants')->default(true);
            $oTable->boolean('require_personal_info')->default(true);
            $oTable->boolean('require_backtrack_info')->default(true);
            $oTable->boolean('allow_online_payment')->default(false);
            $oTable->string('other_form_fields')->nullable();
            $oTable->boolean('is_active')->default(true);
            $oTable->unsignedBigInteger('added_by');
            $oTable->unsignedBigInteger('event_id');
            $oTable->timestamps();

            $oTable->foreign('added_by')
                ->on('users')
                ->references('id');

            $oTable->foreign('event_id')
                ->on('events')
                ->references('event_id');
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
