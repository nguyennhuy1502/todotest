<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('./todos/css/app.css') }}" >
        <title>Laravel</title>
    </head>
    <body>
        
        <main class="wraper d-flex flex-column align-items-center justify-content-center">
            <h1> Todos List</h1>
            <form action="{{ route('create') }}" method="POST" class="todos-form d-flex align-items-center flex-wrap">
                @csrf

                @if(session()->has('success'))
                <div class="alert alert-success text-capitalize rounded-0 mb-3">{{ session()->get('success')}}</div>
                @endif

                <input type="text" name="todo" class="@error('todo') border border-danger @enderror form-control rounded-0" placeholder="enter task">
                <button class="btn btn-primary d-flex align-items-center justify-content-center text-capitalize rounded-0">
                    add
                </button>

                @error('todo')
                    <div class="alert  alert-danger text-capitalize rounded-0 mt-3">{{  $message  }}</div>
                @enderror

            </form>
            <div class="todos-list mt-3">

                @foreach ($todos as $todo)

                <div class="item d-flex align-items-center">
                    <p class="text p-0 m-0 text-capitalize">{{ $todo->todo }}</p>

                <form action="{{ route('delete', ['id' => $todo->id]) }}" method="POST" class="delete-form">
                @csrf
                <i class="fa fa-trash"  style="margin-left: 100px;"></i><button class="btn btn-danger">Delete</button>
                </form>
                </div>

                @endforeach
            </div>
        </main>
    </body>
</html>