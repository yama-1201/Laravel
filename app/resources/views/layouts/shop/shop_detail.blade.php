@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- 店舗詳細 -->
            <div class="container mt-5">
                <div class="d-flex justify-content-between">
                                <h1 class="card-title">{{ $store->name }}</h1>
                                <button>ブックマークする</button>
                                <button>レビューを投稿する</button>
                                <h5 class="card-text">点: {{ number_format($store->reviews_avg_rating, 1) }}点</h5>
                </div>
                <div class="mt-5">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <img src="{{ asset($store->image_path) }}" class="img-fluid" alt="店舗画像" style="height: 400px;">   
                            <p class="card-text mt-3">住所: {{ $store->address }}</p>
                            <button>違反報告する</button>
                        </div>
                        <div class="col">
                            <h2 class="mt-5">ユーザーレビュー一覧</h2>
                                @forelse ($store->reviews as $review)
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $review->title }}</h5>
                                            <p class="card-text">{{ $review->content }}</p>
                                            <small>投稿者: {{ $review->user->name ?? '匿名' }}</small>
                                        </div>
                                    </div>
                                @empty
                                <p class="mt-3 mx-3">まだレビューはありません</p>
                                @endforelse
                            </div> 
                    </div>
                </div>
                
            </div>
        </main>

@endsection