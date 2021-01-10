<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{TaskUser, Task};

class TaskUserController extends Controller
{
    /**
     * Store a newly created resource in storage for a given task (in uri param).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Task $task le task dans lequel on souhaite ajouter un utilisateur
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task){
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id'
        ]);
        $task_user = new TaskUser(); 
        $task_user->user_id = $validatedData['user_id']; 
        $task_user->task_id = $task->id; 
        $task_user->save(); 
        return redirect()->route('tasks.show', $task);
    }
}
