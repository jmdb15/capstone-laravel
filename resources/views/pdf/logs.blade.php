<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add CSS styles for the PDF content here */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Events Report</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Activity</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $logs)
                <tr>
                    <td>{{ $logs->user_name }}</td>
                    <td>{{ $logs->activity }}</td>
                    <td>{{ $logs->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
