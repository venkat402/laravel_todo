@include('header') 
<div class="container">
    @if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <form action="task/save" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputTask">Add Task</label>
            <input type="text" name="task" class="form-control" id="exampleInputTask" aria-describedby="emailHelp" placeholder="Enter Task details">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>    




    <hr>
    <h3>Your tasks list</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($tasks)
            @foreach($tasks as $index => $task)
            <tr>
                <th scope="row">{{$index + 1}}</th>
                <td>{{ $task->task_name }}</td>
                <td><a href="/task/status/{{$task->id}}"><button type="button" class="btn btn-primary">{{$task->task_status}}</button></td>
                <td>
                    <a href="/task/update/{{$task->id}}"><button type="button" class="btn btn-success"> Update</button></a>
                    &nbsp;
                    <a href="/task/delete/{{$task->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
            @else
        <p>no tasks found.</p>
        @endif

        </tbody>
    </table>
</div>
