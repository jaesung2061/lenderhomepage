<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('secret'),
        ]);

        $teams = factory(\App\Team::class, 10)->create();

        foreach ($teams as $team) {
            factory(\App\Player::class, 10)->create([
                'team_id' => $team->id
            ]);
        }
    }
}
