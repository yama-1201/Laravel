@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- プロフィール -->
            <div class="container my-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col card">
                    <img src="{{ $user ? asset('storage/' . $user->image) : '/images/default-user.png' }}">
                    <h5 class="user-name fw-bold">{{$user->name}}</h5>
                    </div>
                    <div class="col card">
                        <h5 class="card-title">プロフィール</h5>
                        <p class="card-text">{{$user->profile}}</p>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <a href="#" class="btn btn-primary btn-sm w-50">
                                <p class="fas fa-user-edit">ユーザー情報編集</p> 
                            </a>
                            <a href="#" class="btn btn-danger btn-sm mt-5 w-50">
                                <p class="fas fa-user-times">ユーザー退会</p> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-bottom border-secondary mt-5"></div>
                

                <h2 class="text-center mb-4 mt-5">投稿一覧</h2>
                <div class="container my-5">
                    @forelse ($reviews as $review)
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset($review->image) }}" class="card-img-top img-fluid" alt="レビュー画像">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $review->title }}</h5>
                                        <p class="card-text">点: {{ $review->rating }}点</p>
                                        <p class="card-text">住所: {{ $review->store->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="text-center mb-0">まだ投稿していません。</p>
                        </div>
                    @endforelse
                </div>
                <div class="text-center mt-3">
                    <a href="#" class="btn btn-primary">投稿をすべて見る</a>
                </div>
            </div>
        </main>

@endsection