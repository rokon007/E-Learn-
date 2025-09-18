<!DOCTYPE html>
<html>
<head>
    <title>Users Export</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Users List</h1>
        <p>Generated on: {{ date('Y-m-d H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>WhatsApp Number</th>
                <th>Email</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->whatsapp_number }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->country }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
