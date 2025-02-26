<?php

namespace Database\Seeders;

use App\Models\ColorSetting;
use Illuminate\Database\Seeder;

class ColorSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'variable_name' => 'olive-dark',
                'color_code' => '#212e83',
            ],
            [
                'variable_name' => 'olive-light',
                'color_code' => '#ffffff',
            ],
            [
                'variable_name' => 'olive-semi-light',
                'color_code' => '#eee9cf',
            ],
            [
                'variable_name' => 'bg-common',
                'color_code' => '#fffde7',
            ],
            [
                'variable_name' => 'theme-primary',
                'color_code' => '#2c9ec0',
            ],
            [
                'variable_name' => 'gray-dark',
                'color_code' => '#333333',
            ],
            [
                'variable_name' => 'theme-muted-light',
                'color_code' => '#ebebeb',
            ],
            [
                'variable_name' => 'bg-sky-light',
                'color_code' => '#e9faff',
            ]
        ];

        foreach ($records as $record) {
            ColorSetting::create($record);
        }
    }
}
