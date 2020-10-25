<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // companies table
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('industry')->nullable();
            $table->mediumText('website')->nullable();
            $table->mediumText('career_page_url')->nullable();

            // company branding
            $table->string('brand_color')->nullable();
            $table->string('logo')->nullable();

            // company social sharing details
            $table->string('thumbnail')->nullable();
            $table->longText('description')->nullable();

            $table->string('phone')->nullable();
       
            $table->string('type')->nullable();

            $table->boolean('upload_successfull')->default(false)->nullable();
            $table->string('disk')->default('public')->nullable();

            $table->timestamps();
        });

        // users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')
            ->on('companies')->onDelete('cascade');
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('signature')->nullable();
            $table->boolean('report_notification')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('companies');
        Schema::dropIfExists('users');
    }
}
