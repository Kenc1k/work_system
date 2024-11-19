<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hudud-name {
            font-weight: bold;
            font-size: 1rem;
            color: #555;
        }

        .task-name {
            font-weight: bold;
            font-size: 1.2rem;
            color: #007bff;
        }

        .status {
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Your Tasks</h1>

    @if ($tasks->isEmpty())
        <p>No tasks available.</p>
    @else
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <span class="hudud-name">Hudud: {{ $task->hudud->name ?? 'Hudud Name Unavailable' }}</span>
                    <br>
                    <span class="task-name">Task: {{ $task->topshiriq->name ?? 'Task Name Unavailable' }}</span>
                    <br>
                    <span class="status">Status: {{ $task->status }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
