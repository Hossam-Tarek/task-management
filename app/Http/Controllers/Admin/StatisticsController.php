<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::user()
            ->select(['name', 'email'])
            ->withCount('tasks')
            ->orderBy('tasks_count', 'DESC')
            ->having('tasks_count', '>', 0)
            ->limit(10)
            ->get();

        return view('admin.statistics', [
            'users' => $users,
        ]);
    }
}
