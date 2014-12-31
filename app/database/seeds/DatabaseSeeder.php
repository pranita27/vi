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

		$this->call('VisitorsTableSeeder');
		$this->command->info('Visitors: Seeding complete');
		$this->call('VisitsTableSeeder');
		$this->command->info('Visits: Seeding complete');
	}

}
