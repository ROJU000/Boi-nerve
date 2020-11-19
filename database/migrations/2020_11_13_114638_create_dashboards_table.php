<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boi', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('enumerator');
            $table->string('gender');
            $table->date('dob');
            $table->string('phone')->unique();
            $table->string('tradetype');
            $table->string('tradesubtype');
            $table->string('state');
            $table->string('lga');
            $table->string('cluster_location');
            $table->unsignedSmallInteger('disbursement');
            $table->dateTime('date_disbursement');
            $table->string('is_disbursed');
            $table->dateTime('date_enumerated');
            $table->string('wallet_name');
            $table->string('senatorial_zone');
            $table->string('is_cashedout');
            $table->dateTime('date_cashout');
            $table->string('region');
            $table->string('product');
            $table->string('status');
            $table->string('src');
            $table->date('closure_date');
            $table->decimal('amount_repaid_closed');
            $table->integer('no_of_trans_onecard');
            $table->decimal('total_amount_onecard');
            $table->dateTime('last_pay_date_onecard');
            $table->integer('no_of_trans_paydirect');
            $table->decimal('total_amount_paydirect');
            $table->dateTime('last_pay_date_paydirect');
            $table->decimal('total_payments_made');
            $table->dateTime('last_pay_date_bankone');
            $table->decimal('boi_bankone_amount');
            $table->decimal('amount_due');
            $table->decimal('amount_default');
            $table->string('customer_grade');
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
        Schema::dropIfExists('boi');
    }
}
