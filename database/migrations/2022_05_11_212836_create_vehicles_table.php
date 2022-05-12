<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tbl_vehicles',
            function (Blueprint $table) {
                $table->id();
                $table->string('make');
                $table->string('model_name');
                $table->string('version');
                $table->text('powertrain');
                $table->string('fuel');
                $table->year('model_year');
                $table->string('image');
                $table->timestamp('created_at')->nullable()->format('YmdHms');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_vehicles');
    }
}
