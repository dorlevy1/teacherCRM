<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;
use Faker\Factory;
class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $container;
    public function run()
    {

        Classes::factory()->create();
    }
}
