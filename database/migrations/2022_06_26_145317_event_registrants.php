<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventRegistrants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registrants', function (Blueprint $oTable) {
            $oTable->id('event_registrant_id');
            $oTable->string('reference_no');
            $oTable->string('first_name');
            $oTable->string('last_name');
            $oTable->string('email');
            $oTable->string('contact_no');
            $oTable->string('agency');
            $oTable->string('job_position');
            $oTable->string('address');
            $oTable->string('prc_license_no');
            $oTable->string('prc_license_expiry_date');
            $oTable->enum('have_paid', ['yes', 'not yet', 'not a registered participant']);
            $oTable->string('payment_mode');
            $oTable->string('payment_branch');
            $oTable->string('payment_date');
            $oTable->string('payment_amount');
            $oTable->string('payment_file');
            $oTable->string('other_registrants');
            $oTable->string('total_amount_to_be_paid');
            $oTable->string('payment_online_transaction_id')->nullable();
            $oTable->string('payment_online_amount')->nullable();
            $oTable->string('payment_online_biller_name')->nullable();
            $oTable->string('other_form_fields')->nullable();
            $oTable->boolean('is_anonymous')->default(true);
            $oTable->boolean('have_released_certificate')->default(false);
            $oTable->unsignedBigInteger('user_id')->nullable();
            $oTable->unsignedBigInteger('event_id');
            $oTable->timestamps();

            $oTable->foreign('user_id')
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
