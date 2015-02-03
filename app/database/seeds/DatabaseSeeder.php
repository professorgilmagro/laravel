<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info( "User table seeded!" ) ;
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

		User::create(
				array(
				"email" => "foo@bar.com" ,
				"first_name" => "Jose" ,
				"last_name" => "Maria" ,
				"gender" => "male" ,
				"birth_date" => "1981-08-20" ,
			)
		) ;

		User::create(
				array(
				"email" => "test@gmail.com" ,
				"first_name" => "Kaio" ,
				"last_name" => "Resende" ,
				"gender" => "male" ,
				"birth_date" => "1990-10-10" ,
			)
		) ;
    }
}
