<?php

class VisitorsTableSeeder extends Seeder {

  public function run() {
    $faker = Faker\Factory::create();
    for ($i = 0; $i < 20; $i++) {
      $visitor = Visitor::create([
        'name' => $faker->name,
        'submitted_id' => $faker->randomElement([
          'Passport',
          'PAN card',
          'Company ID',
        ]),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'from' => $faker->country,
      ]);
    }
  }
}
