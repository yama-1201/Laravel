@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- レビュー詳細 -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-text">タイトル：{{ $review->title }}</h4>    
                            <h4 class="card-text">点数: {{ $review->rating }}点</h4>
                        </div>
                        <div class="border-bottom border-secondary mt-3"></div>
                        <div class="mt-5">
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <div class="col">
                                    <img src="{{ asset('storage/' . $review->store->image_path) }}"  class="img-fluid" alt="店舗画像" style="height: 400px;"> 
                                    <p class="card-text">店名：{{ $review->store->name }}</p>  
                                    <p class="card-text mt-3">住所: {{ $review->store->address }}</p>
                                    <a href="{{ route('showReport', ['id' => $user->id]) }}" class="btn btn-primary mx-5">違反報告する</a>
                                </div>
                                <div class="col">
                                    <h4 class="mt-5">〈投稿内容〉</h4>
                                    <div class="card mt-3">
                                        <p>{{ $review->content }}</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </main>

@endsection