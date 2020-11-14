<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
			
			'site_name' =>"Laravel's Blog",
			
			'address' =>"Sylhet,Bangladesh",
			
			'contact_number' =>"123876",
			
			'contact_email' =>"info@blog.com",
			
			
		]);
    }
}
