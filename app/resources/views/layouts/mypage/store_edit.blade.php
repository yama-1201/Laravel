@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">店舗の編集・削除</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('editstore', ['id' => $store->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">店舗名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $store['name'] }}" />
              </div>
              <div class="form-group">
                <label for="address">住所</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $store['address'] }}" />
              </div>
              <div class="form-group">
                <label for="description">紹介内容</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ $store['description'] }}</textarea>
              </div>
              <div class="form-group">
                <label for="image_path">店舗画像</label>
                <input type="file" class="form-control" id="image_path" name="image_path" />
                @if($store['image_path'])
                    <img src="{{ asset('storage/' . $store->image_path) }}" alt="店舗画像" style="max-width: 200px; margin-top: 10px;">
                @endif
              </div>
              <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">編集する</button>
              </div>
            </form>
            <form action="{{ route('deletestore', ['id' => $store->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-danger">投稿を削除する</button>
                </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection