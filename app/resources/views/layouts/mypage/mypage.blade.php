@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- プロフィール -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                            <h5 class="fw-bold">ユーザー名：{{$user->name}}</h5>
                            </div>
                            <div class="col card">
                                <h5 class="card-title">プロフィール</h5>
                                <p class="card-text">{{$user->profile}}</p>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="{{ route('showEdituser' , ['id' => $user['id']]) }}" class="btn btn-primary btn-sm w-50">ユーザー情報編集</a>
                                    <a href="{{ route('showUserdelete' , ['id' => $user['id']]) }}" class="btn btn-danger btn-sm mt-5 w-50">ユーザー退会</a>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom border-secondary mt-5"></div>
                    <!-- 店舗登録一覧 -->
                    @auth
                        @if (Auth::user()->role == 2)
                            <h2 class="text-center mb-4 mt-5">登録店舗一覧</h2>
                            <div class="container my-5">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @forelse ($stores as $store)
                                        <div class="col">
                                            <div class="card h-100">
                                                <img src="{{ asset('storage/' . $store->image_path) }}"  class="card-img-top img-fluid" alt="レビュー画像">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $store->name }}</h5>
                                                    <p class="card-text">住所: {{ $store->address }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="text-center mb-0">まだ登録していません。</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{ route('showStorepostall', ['id' => $user->id]) }}" class="btn btn-primary mx-5">登録店舗をすべて見る</a>
                            </div>

                            <div class="border-bottom border-secondary mt-5"></div>
                        @endif
                    @endauth    

                        <!-- 投稿一覧 -->
                        <h2 class="text-center mb-4 mt-5">投稿一覧</h2>
                        <div class="container my-5">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @forelse ($reviews as $review)
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/' . $review->image) }}" class="card-img-top img-fluid" alt="レビュー画像">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $review->title }}</h5>
                                                <p class="card-text">点: {{ $review->rating }}点</p>
                                                <p class="card-text">住所: {{ $review->store->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="text-center mb-0">まだ投稿していません。</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('showPostall', ['id' => $user->id]) }}" class="btn btn-primary mx-5">投稿をすべて見る</a>
                        </div>

                        <div class="border-bottom border-secondary mt-5"></div>

                        <!-- ブックマーク一覧 -->
                        <h2 class="text-center mb-4 mt-5">ブックマーク一覧</h2>
                        <div class="container my-5">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @forelse ($bookmarks as $bookmark)
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/' . $bookmark->image_path) }}" class="card-img-top img-fluid" alt="店舗画像">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $bookmark->name }}</h5>
                                                <p class="card-text">点: {{ number_format($bookmark->reviews_avg_rating, 1) }}点</p>
                                                <p class="card-text">住所: {{ $bookmark->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="text-center mb-0">まだブックマークしていません。</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('showBookmark', ['id' => $user->id]) }}" class="btn btn-primary mx-5">ブックマークをすべて見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection