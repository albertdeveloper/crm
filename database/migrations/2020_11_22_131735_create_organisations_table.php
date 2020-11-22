<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',50);
            $table->string('phone',50);
            $table->text('address');
            $table->string('city',50);
            $table->string('region',50);
            $table->string('country',50);
            $table->string('postal',20);
            $table->timestamps();

            $table->index(['name','email','country']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisations');
    }
}
