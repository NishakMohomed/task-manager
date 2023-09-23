<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //$tasks = User::find(1)->tasks;

        $tasks = Task::all()->where('user_id', '=', $request->user()->id);

        return view('task', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required'
        ]);

        $userId = $request->user()->id;
        $user = User::find($userId);
        $user->tasks()->create($validatedData);
        return redirect(route('task.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $taskData)
    {
        $data = $request->all();
        $taskData->update($data);
        return redirect(route('task.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $taskData)
    {
        $taskData->delete();
        return redirect(route('task.index'));
    }
}
