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
                <th>Email</th>
                <th>Email Verified At</th>
                <th>Account Type</th>
                <th>Trusted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->trusted == 0 ? 'Not yet' : 'Yes'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
