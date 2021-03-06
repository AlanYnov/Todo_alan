<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{TaskUser, Board, Task};

class TaskUserController extends Controller
{
    /**
     * Store a newly created resource in storage for a given task (in uri param).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Task $task le task dans lequel on souhaite ajouter un participant
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Board $board, Task $task)
    {
        $validatedData = $request->validate([
            'participant_id' => 'required|integer|exists:users,id'
        ]);
        $task_user = new TaskUser(); 
        $task_user->user_id = $validatedData['participant_id']; 
        $task_user->task_id = $task->id; 
        $task_user->save(); 

        return redirect()->route('tasks.show', [$board, $task]);
    }

            /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskUser  $taskUser l'instance à supprimer
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskUser $taskUser)
    {
        $taskUser->delete();
        $task = $taskUser->task;
        $board = $task->board;
        return redirect()->route('tasks.show', [$board, $task]);
    }
}
