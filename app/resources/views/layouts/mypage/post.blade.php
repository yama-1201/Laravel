@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- 投稿内容 -->
            <div class="container my-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">店名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="title">投稿タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="rating">レビュー点数</label>
                            <select name="rating" id="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating') }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">投稿内容</label>
                           <textarea name="content" id="content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">投稿写真</label>
                            <input type="file" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">レビュー投稿する</button>
                    </form>
                </div>                    
            </div>
        </main>

@endsection