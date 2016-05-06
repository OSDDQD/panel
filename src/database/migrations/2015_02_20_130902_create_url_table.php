<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('links', function($table)
         {
                 $table->string('display');
                 $table->string('url');
                 $table->boolean('main')->nullable();
                 $table->timestamps();
        });

        Serverfireteam\Panel\Link::create(array(
            'display' => 'Links',
            'url' =>  'Link'
        ));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('links');
	}

}
