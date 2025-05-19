@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">店舗登録</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('newshop') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">店名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" />
                </div>
                <div class="form-group ">
                    <label for="description">紹介内容</label>
                    <textarea class="form-control" name="description" id="description" style="height: 200px;">{{ old('description') }}</textarea>
                </div>
                <div class="form-group mt-1">
                    <label for="image_path">店舗画像</label>
                    <input type="file" name="image_path" id="image_path" accept="image/*">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">確認画面へ</button>
                </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection