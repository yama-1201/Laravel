@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">ユーザー情報の編集</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('edituser', ['id' => $user->id]) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" />
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" />
              </div>
              <div class="form-group">
                <label for="profile">プロフィール</label>
                <textarea class="form-control" id="profile" name="profile" rows="4">{{ $user['profile'] }}</textarea>
              </div>
              <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">登録する</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection