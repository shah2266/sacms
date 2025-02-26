<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Hero;
use App\Models\Page;
use App\Models\User;
use App\Models\UserTheme;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->create();
        //UserTheme::factory()->create(); // Seed with default "Dark" theme
        $this->call([UserThemeSeeder::class]);
        $this->call([ColorSettingSeeder::class]);
        Company::factory()->count(1)->create();
        Page::factory()->count(1)->create();
        Hero::factory()->count(1)->create();
    }
}
