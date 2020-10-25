<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');

            $table->string('title');
            $table->string('internal_job_code')->nullable();
            $table->string('tags')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('keywords')->nullable();

            $table->string('salary_from')->nullable();
            $table->string('salary_to')->nullable();
            $table->string('salary_currency')->nullable();

            $table->string('equity_from')->nullable();
            $table->string('equity_to')->nullable();

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->boolean('isRemote')->default(false)->nullable();

            $table->string('company_industry')->nullable();
            $table->string('function')->nullable();

            $table->longText('role_overview')->nullable();
            $table->longText('responsibilties')->nullable();
            $table->longText('requirements')->nullable();
            $table->longText('benefits')->nullable();


            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
