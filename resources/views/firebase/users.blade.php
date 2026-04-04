<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>قائمة مستخدمي Firebase</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: right; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
<h2>قائمة مستخدمي Firebase</h2>

<table>
    <thead>
        <tr>
            <th>UID</th>
            <th>البريد الإلكتروني</th>
            <th>الاسم</th>
            <th>رقم الهاتف</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->uid }}</td>
            <td>{{ $user->email ?? '-' }}</td>
            <td>{{ $user->displayName ?? '-' }}</td>
            <td>{{ $user->phoneNumber ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
