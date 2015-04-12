<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropActiveColumnFromUsers extends Migration {

	/**
         * Modificamos o eliminamos una columna
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{   // eliminamos el campo active.
          /*  Schema::table('users',function(Blueprint $table){
                $table->dropColumn('active');
            });*/
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{   // agregamos la col active.
          /*  Schema::table('users',function(){
               $table->boolean('active')->default(true); 
            });*/
		//
	}

}
