<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::insert([
            ['title' => 'Pending'],
            ['title' => 'Completed'],
            ['title' => 'On The Way'],
            ['title' => 'Canceled'],
            ['title' => 'Processing'],
            ['title' => 'Refunded'],
            ['title' => 'Returned'],
        ]);
    }
}
