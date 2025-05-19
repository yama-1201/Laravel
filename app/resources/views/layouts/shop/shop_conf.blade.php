@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">店舗登録確認</div>
          <div class="card-body">
            <form action="{{ route('newshopcomp') }}" method="POST">
              @csrf
                <input type="hidden" name="name" value="{{ $name }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="description" value="{{ $description }}">
                <div class="form-group">
                    <label for="name">店名</label>
                    <p>{{ $name }}</p>
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <p>{{ $address }}</p>
                </div>
                <div class="form-group">
                    <label for="description">紹介内容</label>
                    <p>{{ $description }}</p>
                </div>
                <div class="form-group">
                    <label for="image_path">店舗画像</label>
                    <img src="{{ asset('storage/' . $image_path) }}" class="card-img-top img-fluid w-50" alt="店舗画像">
                </div>
              
              <div class="text-center">
                <a href="{{ route('showNewshop') }}" class="btn btn-secondary mt-3">戻る</a>
                <button type="submit" class="btn btn-primary mt-3">登録する</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection