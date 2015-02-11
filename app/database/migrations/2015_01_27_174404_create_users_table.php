<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create( 'users' , function( $table ) {
			$table->increments( "user_id" )->unsigned() ;
			$table->string( "email" )->unique() ;
			$table->string( "first_name" ) ;
			$table->string( "last_name" )->nullable() ;
			$table->string( "gender" )->enum( "male" , "female" )->default( "male" ) ;
			$table->date( "birth_date" )->nullable() ;
			$table->string( "password" ) ;
			$table->softDeletes() ;
			$table->timestamps();
			$table->rememberToken() ;
		} ) ;
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists( "users" ) ;
	}

}
