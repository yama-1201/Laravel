@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- レビュー詳細 -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="card d-flex justify-content-between">
                            <p class="card-text">ユーザー名 {{ $review->user->name }}点</p>
                            <p class="card-text">タイトル：{{ $review->title }}</p>
                            <p class="card-text">投稿内容{{ $review->content }}</p>    
                        </div>
                        <div class="border-bottom border-secondary mt-3"></div>
                        <div class="mt-5">
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                            <a href="{{ route('showReport', ['id' => $user->id]) }}" class="btn btn-primary mx-5">違反報告する</a>
            
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </main>

@endsection