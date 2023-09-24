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
        if($request->filter){
            if($request->filter === 'All' || $request->filter === 'Category'){
                $tasks = Task::all()->where('user_id', '=', $request->user()->id);
                return view('task', ['tasks' => $tasks]);
            }
            else{
                $tasks = Task::all()->where('user_id', '=', $request->user()->id)->where('category', '=', $request->filter);
                return view('task', ['tasks' => $tasks]);
            }
        }
        else{
            $tasks = Task::all()->where('user_id', '=', $request->user()->id);
            return view('task', ['tasks' => $tasks]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Data validation before inserting
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'status' => 'required'
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
        //Data validation before updating
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'status' => 'required'
        ]);

        $taskData->update($validatedData);
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
