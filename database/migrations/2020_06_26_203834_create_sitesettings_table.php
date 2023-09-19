<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo');
            $table->longText('about');
            $table->longText('footer_about');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('work_hour');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('news_letter_title');
            $table->string('news_letter_msg');
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
        Schema::dropIfExists('sitesettings');
    }
}
