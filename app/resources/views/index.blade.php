<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>モデルのテスト</title>
</head>
<body>
    <table>
        <tr>
            <th>ユーザー名</th>
            <th>メールアドレス</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email}}</td>
            </tr>
        @endforeach
    </table>
    
</body>
</html>