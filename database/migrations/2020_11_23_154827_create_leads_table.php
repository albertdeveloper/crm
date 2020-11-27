<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('lead_type')->default(1)->comment('1 - Lead, 2 - Converted to Contact & Account,3 - Deals');
            $table->string('owner',100)->nullable();
            $table->string('company',100)->nullable();
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('title',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('website',100)->nullable();
            $table->unsignedBigInteger('lead_source_id')->nullable();
            $table->unsignedBigInteger('lead_status_id')->nullable();
            $table->string('industry',100)->nullable();
            $table->integer('no_employees')->nullable();
            $table->decimal('annual_revenue',8,2)->nullable();
            $table->integer('rating')->nullable();
            $table->string('street',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('zipcode',50)->nullable();
            $table->string('country',100)->nullable();

            $table->timestamps();

            $table->foreign('lead_source_id')->references('id')->on('lead_sources')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lead_status_id')->references('id')->on('lead_statuses')->onDelete('cascade');

            $table->index(['owner','company','email']);
            $table->index(['city','state','country']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
