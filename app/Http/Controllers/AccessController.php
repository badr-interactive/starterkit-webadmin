<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;

class AccessController extends Controller
{
    public function index(Request $request)
    {
        $routes = Route::getRoutes();
        $namedRoutes = [];
        foreach ($routes as $route) {
            if ($route->getName()) {
                array_push($namedRoutes, $route);
            }
        }

        return response()->view('control.index', ['routes' => $namedRoutes]);
    }
}
