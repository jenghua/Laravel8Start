<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CompletedTasksController extends Controller
{
    public function store(Task $task)
    {
        $task->completed();
        return back();
    }

    public function destory(Task $task)
    {
        $task->incompleted();
        return back();
    }
}
