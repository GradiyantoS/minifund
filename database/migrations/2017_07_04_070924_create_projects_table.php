<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('cultivation_id');
            $table->bigInteger('project_no');
            $table->string('title');
            $table->date('start_at');
            $table->date('end_at');
            $table->string('image_url');
            $table->timestamps();
            $table->foreign('cultivation_id')->references('id')->on('cultivations');
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
        Schema::dropIfExists('projects');
    }
}
