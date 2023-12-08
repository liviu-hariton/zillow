<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return inertia('Index/Index', [
            // this is the data that will be passed to the component
            // via defineProps() in the Vue component
            // use camelCase for the keys
            'message' => 'Hello World!',
        ]);
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
