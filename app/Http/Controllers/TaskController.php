<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks');
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }
}
