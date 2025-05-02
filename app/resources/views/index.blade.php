<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>モデルのテスト</title>
</head>
<body>
    <!-- Usersテーブル -->
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

<!-- Storesテーブル -->
    <table>
        <tr>
            <th>店名</th>
            <th>紹介内容</th>
            <th>住所</th>
        </tr>
        @foreach ($stores as $store)
            <tr>
                <td>{{ $store->name }}</td>
                <td>{{ $store->description }}</td>
                <td>{{ $store->address }}</td>
            </tr>
        @endforeach
    </table>

<!-- Reviewsテーブル -->
    <table>
        <tr>
            <th>タイトル</th>
            <th>本文</th>
        </tr>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->title }}</td>
                <td>{{ $review->content }}</td>
            </tr>
        @endforeach
    </table>

    <!-- Reportsテーブル -->
    <table>
        <tr>
            <th>ユーザーID</th>
            <th>違反報告理由</th>
        </tr>
        @foreach ($reports as $report)
            <tr>
                <td>{{ $report->user_id }}</td>
                <td>{{ $report->comment }}</td>
            </tr>
        @endforeach
    </table>

    <!-- Bookmarksテーブル -->
    <table>
        <tr>
            <th>ユーザーID</th>
            <th>店舗ID</th>
            <th>登録日</th>
        </tr>
        @foreach ($bookmarks as $bookmark)
            <tr>
                <td>{{ $bookmark->user_id }}</td>
                <td>{{ $bookmark->store_id }}</td>
                <td>{{ $bookmark->created_at }}</td>
            </tr>
        @endforeach
    </table>
    
</body>
</html>