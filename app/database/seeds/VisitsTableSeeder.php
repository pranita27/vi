<?php

class VisitsTableSeeder extends Seeder {
  public function run() {
    $faker = Faker\Factory::create();
    $visitor_ids = DB::table('visitors')->lists('id');
    foreach($visitor_ids as $visitor_id) {
      foreach(range(1, 5) as $index) {
        $visit = Visit::create([
          'visitor_id' => $visitor_id,
          'purpose' => $faker->randomElement([
            'Training',
            'Interview',
            'Business meeting',
          ]),
          'to_meet' => $faker->name,
          'issued_id' => $faker->numberBetween(1, 30),
          'updated_at' => NULL,
        ]);
      }
    }
  }
}
