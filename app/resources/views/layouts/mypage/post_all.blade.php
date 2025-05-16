@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- 投稿 -->
            <div class="container my-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($reviews as $review)
                    <div class="col">
                        <a href="{{ route('shopdetail', ['id' => $review->id]) }}">
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
        </main>

@endsection