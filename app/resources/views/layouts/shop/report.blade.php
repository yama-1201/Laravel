@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- レビュー詳細 -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="text-center">
                            <h5>この投稿を違反報告しますか</h5>
                        </div>
                        <div class="card">
                            <div class="card d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <p class="card-text">ユーザー名：{{ $review->user->name }}さん</p>
                                </div>
                                <div class="mt-3">
                                    <p class="card-text">タイトル：{{ $review->title }}</p>
                                </div>
                                <div class="mt-3">
                                    <p class="card-text mb-3">投稿内容：{{ $review->content }}</p>
                                </div>
                            </div> 
                        </div>
                    
                        
                        <div class="border-bottom border-secondary my-3"></div>

                        @if(!Auth::check())
                            <div class="text-center">
                                <p class="text-danger">違反報告するにはログインが必要です。</p>
                                <a href="{{ route('showLogin') }}" class="btn btn-primary">ログイン画面へ</a>
                            </div>

                        @elseif(Auth::user()->stop === 1)
                            <div class="text-center">
                                <p class="text-danger">あなたのアカウントは現在利用停止中のため、違反報告は行えません。</p>
                            </div>
                        @else
                            <form action="{{ route('report') }}"  method="POST">
                                @csrf
                                <input type="hidden" name="review_id" value="{{ $review->id }}">

                                <div class="mb-3">
                                    <label for="comment" class="form-label">違反理由</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="5" placeholder="理由をご記入ください"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger ">違反報告する</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>         
            </div>
        </main>

@endsection