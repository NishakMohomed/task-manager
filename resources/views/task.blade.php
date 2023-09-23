@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-sm-between">
                    {{ __('Tasks') }}

                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-whatever="@mdo">Add new task</button>

                    <!-- --------------------------------------Add task modal--------------------------------------- -->

                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">New task</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('task.create')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="task-title" class="col-form-label">Title:</label>
                                            <input type="text" name="title" class="form-control" id="task-title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <textarea class="form-control" name="description" id="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="col-form-label">Status:</label>
                                            <select class="form-select" name="status" id="status" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">To-Do</option>
                                                <option value="2">In-progress</option>
                                                <option value="3">Done</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="col-form-label">Category:</label>
                                            <select class="form-select" name="category" id="category" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">To-Do</option>
                                                <option value="2">In-progress</option>
                                                <option value="3">Done</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ------------------------------------------------------------------------------------------- -->
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Task table -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)

                            <tr>
                                <th>{{$task->title}}</th>
                                <td>{{$task->description}}</td>
                                <td>
                                    @if($task->status === '1')
                                    <span class="badge rounded-pill text-bg-warning">
                                        To-Do
                                    </span>
                                    @elseif($task->status === '2')
                                    <span class="badge rounded-pill text-bg-primary">
                                        In-progress
                                    </span>
                                    @else
                                    <span class="badge rounded-pill text-bg-success">
                                        Done
                                    </span>
                                    @endif
                                </td>
                                <td>{{$task->category}}</td>
                                <td class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{$task->id}}" data-bs-whatever="@mdo" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .70rem;">
                                        Edit
                                    </button>

                                    <!-- ---------------------------------------------Edit task modal-------------------------------------------- -->

                                    <div class="modal fade" id="editModal{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit task</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{route('task.update', ['taskData' => $task])}}">
                                                        @csrf
                                                        @method('put')
                                                        <div class="mb-3">
                                                            <label for="task-title" class="col-form-label">Title:</label>
                                                            <input type="text" name="title" value="{{$task->title}}" class="form-control" id="task-title">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="col-form-label">Description:</label>
                                                            <textarea class="form-control" name="description" id="description">
                                                            {{$task->description}}
                                                            </textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="col-form-label">Status:</label>
                                                            <select class="form-select" name="status" id="status" aria-label="Default select example">
                                                                <option value="1" {{($task->status === '1') ? 'selected' : ''}}>To-Do</option>
                                                                <option value="2" {{($task->status === '2') ? 'selected' : ''}}>In-progress</option>
                                                                <option value="3" {{($task->status === '3') ? 'selected' : ''}}>Done</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category" class="col-form-label">Category:</label>
                                                            <select class="form-select" name="category" id="category" aria-label="Default select example">
                                                                <option value="1" {{($task->category == '1') ? 'selected' : ''}}>To-Do</option>
                                                                <option value="2" {{($task->category == '2') ? 'selected' : ''}}>In-progress</option>
                                                                <option value="3" {{($task->category == '3') ? 'selected' : ''}}>Done</option>
                                                            </select>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ------------------------------Delete Button------------------------------ -->

                                    <form method="POST" action="{{route('task.destroy', ['taskData' => $task])}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .70rem;">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection