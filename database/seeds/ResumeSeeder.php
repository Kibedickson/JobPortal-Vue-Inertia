<?php

use App\Resume;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resume = [
            [
              'user_id' => 3,
              'title' => 'Web Developer',
            'location' => 'Kisumu',
            'age' => '24',
            'degree' => 'Bachelor',
            'field' => 'Computer Science',
            'school' => 'Maseno University',
            'year' => '2020',
            'skill' => 'HTML, CSS, PHP'
            ]
        ];
        Resume::insert($resume);
    }
}
