<?php

namespace Database\Seeders;

use App\Models\UserTheme;
use Illuminate\Database\Seeder;

class UserThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $records = [
            [
                'theme_name' => 'Light',
                'stylesheet_name' => 'light.css',
                'status' => 1,
            ],
            [
                'theme_name' => 'Dark',
                'stylesheet_name' => 'style.css',
                'status' => 1,
            ]
        ];

        foreach ($records as $record) {
            UserTheme::create($record);
        }
    }
}
