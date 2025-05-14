@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">退会</div>
          <div class="card-body">
            <form action="{{ route('userdelete', ['id' => $user->id]) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <p>{{$user->email}}</p>
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <p>{{$user->name}}</p>
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password"/>
              </div>
              <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">退会する</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection