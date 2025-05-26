@extends('layouts.app')
@section('content')
        <main class="py-4">
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="row row-cols-1 row-cols-md-1 g-4">
                            <div class="col">
                                <h5 class="card-title text-center mb-3">この投稿を非表示にしますか</h5>
                                <div class="card">  
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center gap-5 text-center my-4">
                                            <div>
                                                <p class="fw-bold">名前</p>
                                                <p>{{ $review->user->name }}</p>
                                            </div>
                                            <div>
                                                <p class="fw-bold">タイトル</p>
                                                <p>{{ $review->title }}</p>
                                            </div>
                                            <div>
                                                <p class="fw-bold">違反報告数</p>
                                                <p>{{ $review->reports_count }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('owner_postdetail', ['id' => $review->id]) }}" method="POST">
                                    @csrf
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-danger">非表示にする</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection