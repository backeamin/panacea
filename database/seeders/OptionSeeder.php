<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::insert([
           ['title' => 'site_title', 'value' => 'Default'],
           ['title' => 'slogan', 'value' => 'Default'],
           ['title' => 'address', 'value' => 'Default'],
           ['title' => 'logo', 'value' => 'Default'],
           ['title' => 'favicon', 'value' => 'Default'],
           ['title' => 'phone_number', 'value' => 'Default'],
           ['title' => 'phone_number_2', 'value' => 'Default'],
           ['title' => 'email', 'value' => 'default@gmail.com'],
           ['title' => 'email_2', 'value' => 'default@gmail.com'],
           ['title' => 'facebook', 'value' => 'Default'],
           ['title' => 'youtube', 'value' => 'Default'],
           ['title' => 'twitter', 'value' => 'Default'],
           ['title' => 'linkedin', 'value' => 'Default'],
           ['title' => 'telegram', 'value' => 'Default'],
           ['title' => 'whatsapp', 'value' => 'Default'],
           ['title' => 'instagram', 'value' => 'Default'],
        ]);
    }
}
