<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            JobSeeder::class,
            RoleUserSeeder::class,
            ProposalSeeder::class,
            ResumeSeeder::class
            ]);
    }
}
