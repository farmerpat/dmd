<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call(SchoolsTableSeeder::class);
        $this->call(SpellsTableSeeder::class);
    }
}
