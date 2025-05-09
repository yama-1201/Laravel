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
                        <p class="card-text">プロフィール文がここに表示されます。ユーザーについての紹介文や自己紹介などが表示されるエリアです。</p>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <a href="#" class="btn btn-primary btn-sm w-50">
                                <i class="fas fa-user-edit"></i> ユーザー情報編集
                            </a>
                            <a href="#" class="btn btn-danger btn-sm mt-5 w-50">
                                <i class="fas fa-user-times"></i> ユーザー退会
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-bottom border-secondary mt-5"></div>
                

                <h2 class="text-center mb-4 mt-5">投稿一覧</h2>

                <div class="col">
                    <div class="card h-100">
                        <img src="/api/placeholder/300/200" class="card-img-top" alt="レビュー画像">
                        <div class="card-body">
                            <div class="rating mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <h5 class="card-title">投稿タイトル1</h5>
                            <p class="card-text review-content">これは投稿内容のサンプルです。ここに実際のレビュー内容が表示されます。</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">投稿日: 2025/05/01</small>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection