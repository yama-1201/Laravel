<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container text-center">
            <h1>未ログインヘッダー</h1>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="1投稿検索">
                    <button class="btn btn-outline-secondary" type="button">検索</button>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <div class="col">
                <div class="post-item">投稿表示</div>
            </div>
            <div class="col">
                <div class="post-item">
                    <div class="col">
                        <div class="card h-100">
                            <img src="path/to/your/image.jpg" class="card-img-top" alt="店舗の画像">
                            <div class="card-body">
                                <h5 class="card-title">店舗名が入ります</h5>
                                <p class="card-text">レビュー点：★★★★☆</p>
                                <p class="card-text"><small class="text-muted">東京都世田谷区〇〇</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="post-item">
                    <div class="col">
                        <div class="card h-100">
                            <img src="path/to/your/image.jpg" class="card-img-top" alt="店舗の画像">
                            <div class="card-body">
                                <h5 class="card-title">{{ $->$name }}</h5>
                                <p class="card-text">{{ $store->$ }}</p>
                                <p class="card-text"><small class="text-muted">東京都世田谷区〇〇</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="post-item">投稿表示</div>
            </div>
            <div class="col">
                <div class="post-item">投稿表示</div>
            </div>
            <div class="col">
                <div class="post-item">投稿表示</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>