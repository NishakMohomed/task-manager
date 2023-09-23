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
                                    <form>
                                        <div class="mb-3">
                                            <label for="task-title" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="task-title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <textarea class="form-control" id="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="col-form-label">Status:</label>
                                            <select class="form-select" id="status" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">To-Do</option>
                                                <option value="2">In-progress</option>
                                                <option value="3">Done</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="catogery" class="col-form-label">Category:</label>
                                            <select class="form-select" id="catogery" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">To-Do</option>
                                                <option value="2">In-progress</option>
                                                <option value="3">Done</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Add</button>
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
                            <tr>
                                <th>Buy milk</th>
                                <td>Go and buy mil from supermarket for home</td>
                                <td>
                                    <span class="badge rounded-pill text-bg-primary">
                                        To-do
                                    </span>
                                </td>
                                <td>Work</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .70rem;">
                                        Edit
                                    </button>

                                    <!-- ---------------------------------------------Edit task modal-------------------------------------------- -->

                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit task</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="task-title" class="col-form-label">Title:</label>
                                                            <input type="text" class="form-control" id="task-title">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="col-form-label">Description:</label>
                                                            <textarea class="form-control" id="description"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="col-form-label">Status:</label>
                                                            <select class="form-select" id="status" aria-label="Default select example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">To-Do</option>
                                                                <option value="2">In-progress</option>
                                                                <option value="3">Done</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="catogery" class="col-form-label">Category:</label>
                                                            <select class="form-select" id="catogery" aria-label="Default select example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">To-Do</option>
                                                                <option value="2">In-progress</option>
                                                                <option value="3">Done</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ------------------------------Delete Button------------------------------ -->

                                    <button type="button" class="btn btn-danger" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .70rem;">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection