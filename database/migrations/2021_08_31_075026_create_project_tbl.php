<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('project_name');
            $table->text('name_eng');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('funding_id');
            $table->unsignedBigInteger('agency_id');
            $table->unsignedBigInteger('researchtype_id');
            $table->unsignedBigInteger('researchfield_id');
            $table->unsignedBigInteger('issuess_id');
            $table->unsignedBigInteger('strategic_id');
            $table->string('budget');
            $table->string('name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('status')->nullable();
            $table->string('cread')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
