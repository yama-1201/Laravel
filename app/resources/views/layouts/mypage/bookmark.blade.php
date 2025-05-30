@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- ブックマーク -->
            <div class="container my-5">
                <div class="text-center mb-5">
                    <h5><ブックマーク一覧></h5>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($bookmarks as $bookmark)
                                <div class="col">
                                    <a href="{{ route('showShopdetail', ['id' => $bookmark->id]) }}" class="text-decoration-none text-dark">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/' . $bookmark->image_path) }}" class="card-img-top img-fluid" alt="店舗画像">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $bookmark->name }}</h5>
                                                <p class="card-text">点: {{ number_format($bookmark->reviews_avg_rating, 1) }}点</p>
                                                <p class="card-text">住所: {{ $bookmark->address }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection