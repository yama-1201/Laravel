@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">会員登録確認</div>
          <div class="card-body">
            <form action="{{ route('newusercomp') }}" method="POST">
              @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="name" value="{{ $name }}">
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <p>{{ $email }}</p>
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <p>{{ $name }}</p>
              </div>
              <div class="text-center">
                <a href="{{ route('showNewuser') }}" class="btn btn-secondary mt-3">戻る</a>
                <button type="submit" class="btn btn-primary mt-3">登録する</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection