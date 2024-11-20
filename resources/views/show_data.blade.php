<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Details</title>

    <style>
        /* Reset some default styling */
        body,
        h1,
        p,
        form {
            margin: 0;
            padding: 0;
        }

        /* Overall page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
        }

        /* Container for content */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        /* Todo item styling */
        .todo-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .todo-item:last-child {
            border-bottom: none;
        }

        .todo-item p {
            margin: 5px 0;
        }

        .todo-item p span {
            font-weight: bold;
        }

        /* Status styling */
        .status {
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
            font-weight: bold;
        }

        .status.completed {
            background-color: #4CAF50;
            color: white;
        }

        .status.pending {
            background-color: #FF9800;
            color: white;
        }

        /* Button styling */
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Empty message */
        .empty-message {
            font-size: 16px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Todo Details</h1>

        @if($todo_data->count() > 0)
            @foreach ($todo_data as $i)
                <div class="todo-item">
                    <p><span>ID:</span> {{$i->id}}</p>
                    <p><span>Name:</span> {{$i->name}}</p>
                    <p><span>Details:</span> {{$i->details}}</p>
                    <p><span>Status:</span>
                        <span class="status {{ $i->isdone ? 'completed' : 'pending' }}">
                            {{$i->isdone ? 'Completed' : 'Pending'}}
                        </span>
                    </p>


                    <form action="{{ route('todo.delete', $i->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>


                    @if(!$i->isdone)
                        <form action="{{ route('todo.update', $i->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Mark As Done</button>
                        </form>
                    @endif

                </div>
            @endforeach
        @else
            <p class="empty-message">No todo items found!</p>
        @endif


        <form action="/todo" method="post" style="text-align: center; margin-top: 20px;">
            @csrf
            <button type="submit">Add Todo</button>
        </form>

        <form action="{{ route("root")}}" method="get" style="text-align: center; margin-top: 20px;">
            @csrf
            <button type="submit">Change Database</button>
        </form>

    </div>

</body>

</html>