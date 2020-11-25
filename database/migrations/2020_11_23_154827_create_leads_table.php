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
            $table->string('owner',100)->nullable();
            $table->string('company',100)->nullable();
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('title',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('website',20)->nullable();
            $table->unsignedBigInteger('lead_source_id')->nullable();
            $table->string('lead_status',30)->nullable();
            $table->string('industry',100)->nullable();
            $table->integer('no_employees')->nullable();
            $table->decimal('annual_revenue',8,2)->nullable();
            $table->string('rating',10)->nullable();
            $table->timestamps();

            $table->foreign('lead_source_id')->references('id')->on('lead_sources')->onDelete('cascade');
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
