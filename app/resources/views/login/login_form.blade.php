@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">ログイン</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">ログインする</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center mt-3">
          <a class="mx-3" href="{{ route('password.request') }}">パスワードを忘れ方はこちらから</a>
          
        </div>
        <div class="d-flex justify-content-center mt-3">
          <a href="{{ route('showNewuser') }}">新規登録の方はこちら</a>
          <a class="mx-3" href="{{ route('showNewshopuser') }}">店舗新規ユーザー登録の方はこちら</a>
        </div>
      </div>
    </div>
  </div>
@endsection