@extends('layouts.app')
@section('content')
        <main class="py-4">
            <div class="container my-5">
                
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">

                        <!-- 検索 -->
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('toppage') }}" method="GET" class="mb-4 d-flex">
                                <input type="text" name="keyword" value="{{ old('keyword', $keyword) }}" class="form-control me-2" placeholder="キーワードを入力（タイトル・内容・地域）">
                                <select name="rating" class="form-select me-2" style="width: 200px;">
                                    <option value="">点数を選択</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('rating', $rating) == $i ? 'selected' : '' }}>{{ $i }}点</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary">検索</button>
                            </form>
                        </div>
                        <!-- 検索ここまで -->

                        <!-- 投稿 -->
                        <div class="container my-5">
                            <div class="row row-cols-2 row-cols-md-3 g-4">
                                @foreach ($reviews as $review)
                                <div class="col">
                                    <a href="{{ route('showReviewdetail', ['id' => $review->id]) }}">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/' . $review->image) }}"  class="card-img-top img-fluid" alt="レビュー画像">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $review->title }}</h5>
                                                <p class="card-text">点: {{ $review->rating }}点</p>
                                                <p class="card-text">住所: {{ $review->store->address }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </main>

@endsection