<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $models = [
            'User' => '',
            'Contact' => '',
        ];

        $data = [];

        foreach ($models as $model => $statusField) {
            $modelClass = "App\\Models\\$model";
            $pluralModel = Str::plural($model);

            // Total count of the model
            $data[$pluralModel] = $modelClass::count();

            // If status field exists
            if ($statusField) {
                $data["active{$pluralModel}"] = $modelClass::where($statusField, 1)->count();
            }
        }

        return view('admin.home', $data);
    }
}
