<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.index', [
            // These statistic could be called from some sort of service or repository but no need
            // to over-engineer here it's just simple.
            'usersCount' => User::user()->count(),
            'adminsCount' => User::admin()->count(),
            'tasksCount' => Task::query()->count(),
        ]);
    }
}
