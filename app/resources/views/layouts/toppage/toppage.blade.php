@extends('layouts.app')
@section('content')
        <main class="py-4">

            <!-- 検索 -->
            <div class="d-flex justify-content-center">
                <form action="{{ route('toppage') }}" method="GET" class="mb-4 d-flex">
                    <input type="text" name="keyword" class="form-control me-2" placeholder="キーワードを入力（タイトル・内容・地域）">
                    <select name="rating" class="form-select me-2" style="width: 200px;">
                        <option value="">点数を選択</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}点</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary">検索</button>
                </form>
            </div>
            <!-- 検索ここまで -->

            <!-- 投稿 -->
            <div class="container my-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($reviews as $review)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $review->review_image }}" class="card-img-top" alt="レビュー画像">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review->store->name }}</h5>
                                <p class="card-text">点数: {{ $review->rating }}点</p>
                                <p class="card-text">住所: {{ $review->store->address }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>

@endsection