<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ログインフォーム</title>
        <!-- script -->
        <script src="{{asset('js/app.js')}}" defer></script>
        <!-- styles -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/signin.css')}}" rel="stylesheet">
    </head>
    <body>
        <main class="form-signin w-100 m-auto">
            <form class="form-signin" method="post" action="{{route('login')}}">
                <h1 class="h3 mb-3 fw-normal">ログイン</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="email"  placeholder="name@example.com">
                    <label for="floatingInput">メールアドレス</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password"  placeholder="Password">
                    <label for="floatingPassword">パスワード</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">ログイン</button>
            </form>
        </main>
    </body>
</html>