<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingFieldsToDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->string('patient_email')->after('patient_name')->nullable(); // Made it nullable to not break existing rows
            $table->string('patient_phone')->after('patient_email')->nullable();
            $table->date('confirmed_date')->after('requested_date')->nullable();
            $table->time('confirmed_time')->after('confirmed_date')->nullable();
            $table->enum('email_status', ['not_sent', 'sent', 'failed'])->default('not_sent')->after('status');
            $table->text('email_fail_reason')->nullable()->after('email_status');
            $table->string('calendar_event_id')->nullable()->after('email_fail_reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->dropColumn([
                'patient_email',
                'patient_phone',
                'confirmed_date',
                'confirmed_time',
                'email_status',
                'email_fail_reason',
                'calendar_event_id'
            ]);
        });
    }
}
