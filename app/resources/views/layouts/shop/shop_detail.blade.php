@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- 店舗詳細 -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">{{ $store->name }}</h3>
                            @auth
                                @if (Auth::user()->stop == 0 && Auth::user()->role != 3)
                                    {{-- ブックマーク済みかどうかを判定 --}}
                                     @if (Auth::user()->stop == 0 && Auth::user()->role != 3)
                                        <button type="button" 
                                                id="bookmark-button" 
                                                data-id="{{ $store->id }}" 
                                                data-bookmarked="{{ Auth::user()->bookmarks->contains($store->id) ? '1' : '0' }}"
                                                class="btn {{ Auth::user()->bookmarks->contains($store->id) ? 'btn-danger' : 'btn-primary' }}">
                                            {{ Auth::user()->bookmarks->contains($store->id) ? 'ブックマーク解除' : 'ブックマークする' }}
                                        </button>
                                    @endif

                                    {{-- レビュー投稿ボタン --}}
                                    <a href="{{ route('showPost', ['id' => $store->id]) }}" class="btn btn-primary">レビューを投稿する</a>
                                @endif
                            @else
                                <p>※ログインするとブックマークやレビュー投稿ができます。</p>
                            @endauth

                            <h5 class="card-text">点: {{ number_format($store->reviews_avg_rating, 1) }}点</h5>
                        </div>
                        <div class="mt-5">
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <div class="col">
                                    <img src="{{ asset('storage/' . $store->image_path) }}"  class="img-fluid" alt="店舗画像" style="height: 200px;">  
                                    <div class="col card">
                                        <h5 class="card-title">紹介内容</h5>
                                        <p class="card-text">{{$store->description}}</p>
                                    </div> 
                                    <p class="card-text mt-3">住所: {{ $store->address }}</p>
                                </div>
                                <div class="col">
                                    <h2 class="mt-5">ユーザーレビュー一覧</h2>
                                        @forelse ($store->reviews as $review)
                                            <div class="card my-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $review->title }}</h5>
                                                    <p class="card-text">{{ $review->content }}</p>
                                                    <small>投稿者: {{ $review->user->name ?? '匿名' }}</small>
                                                </div>
                                            </div>
                                        @empty
                                        <p class="mt-3 mx-3">まだレビューはありません</p>
                                        @endforelse
                                    </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            document.querySelector('#bookmark-button').addEventListener('click', function () {
                const button = this;
                const storeId = button.dataset.id;
                const bookmarked = button.dataset.bookmarked === '1'; 

                // HTTPメソッドとURLを決定
                const method = bookmarked ? 'DELETE' : 'POST';
                const url = bookmarked ? `/bookmark/destroy/${storeId}` : `/bookmark/store/${storeId}`;

                fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({}),
                })
                .then(response => response.json())
                .then(data => {

                    // ボタンの見た目と状態を切り替え
                    if (bookmarked) {
                        button.dataset.bookmarked = '0';
                        button.textContent = 'ブックマークする';
                        button.classList.remove('btn-danger');
                        button.classList.add('btn-primary');
                    } else {
                        button.dataset.bookmarked = '1';
                        button.textContent = 'ブックマーク解除';
                        button.classList.remove('btn-primary');
                        button.classList.add('btn-danger');
                    }
                })
                .catch(error => {
                    console.error('エラー:', error);
                });
            });
        </script>

@endsection