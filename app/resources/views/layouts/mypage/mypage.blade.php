@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- 投稿 -->
            <div class="container my-5">
                <div class="col-md-2 text-center user-icon">
                    <img src="/api/placeholder/120/120" alt="ユーザーアイコン" class="mb-2">
                    <h5 class="user-name fw-bold">ユーザー名</h5>
                </div>
                <div class="col-md-10">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">プロフィール</h5>
                        <p class="card-text">プロフィール文がここに表示されます。ユーザーについての紹介文や自己紹介などが表示されるエリアです。</p>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-user-edit"></i> ユーザー情報編集
                        </a>
                        <a href="#" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-user-times"></i> ユーザー退会
                        </a>
                    </div>
                </div>

                <h2 class="text-center mb-4">投稿一覧</h2>

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