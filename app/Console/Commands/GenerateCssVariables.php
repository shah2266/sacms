<?php

namespace App\Console\Commands;

use App\Models\ColorSetting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateCssVariables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'css:generate';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate CSS variables from color settings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $colors = ColorSetting::all();
        $cssContent = ":root {\n";
        foreach ($colors as $color) {
            $cssContent .= "    {$color->variable_name}: {$color->color_code};\n";
        }
        $cssContent .= "}\n";

        File::put(public_path('web/css/custom.css'), $cssContent);

        $this->info('CSS variables generated successfully!');
        return 0;
    }
}
