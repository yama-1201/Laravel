@extends('layouts.app')
@section('content')
        <main class="py-4">
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <!-- 一般ユーザーリスト -->
                                <div class="card">
                                    <div class="card-header text-center">
                                         一般ユーザーリスト
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">表示停止された投稿が多い一般ユーザー</h5>
                                        <div class="card-group text-center">
                                            @foreach($users as $user)
                                                <a href="{{ route('showOwner_userdetail', ['id' => $user->id]) }}" class="d-block my-1">
                                                    {{ $user->name }}（停止投稿件数：{{ $user->deleted_reviews_count }}）
                                                </a>                                              
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- 投稿リスト -->
                            <div class="col">    
                                <div class="card">
                                    <div class="card-header text-center">
                                         投稿リスト
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">違反報告が多い投稿</h5>
                                        <div class="card-group text-center">
                                            @foreach($reviews as $review)
                                                <a>
                                                    {{ $review->title }}（違反報告数：{{ $review->reports_count }}）
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection