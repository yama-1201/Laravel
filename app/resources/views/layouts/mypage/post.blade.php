@extends('layouts.app')
@section('content')
        <main class="py-4">
            <!-- 投稿内容 -->
            <div class="container my-5">
                <div class="text-center mb-5">
                    <h5><投稿内容></h5>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <form action="{{ route('post', ['id' => $store->id]) }}" method="POST" enctype="multipart/form-data"> 
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                                @endforeach
                            </div>
                            @endif
                            <div class="container my-5">
                                <div class="row row-cols-1 row-cols-md-2 g-4 px-3">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">店名</label>
                                        <h5 class="fw-bold">{{$store->name}}</h5>
                                        <input type="hidden" name="store_id" value="{{ $store->id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">住所</label>
                                        <h5 class="fw-bold">{{$store->address}}</h5>
                                    </div>
                                </div>
                                <div class="border-bottom border-secondary my-5"></div>
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    <div>
                                        <div class="form-group m-5">
                                            <label for="title">投稿タイトル</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                                        </div>
                                        <div class="form-group m-5">
                                            <label for="rating">レビュー点数</label>
                                            <select name="rating" id="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group m-5">
                                            <label for="image">投稿写真</label>
                                            <input type="file" name="image" id="image" accept="image/*">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mt-5">
                                        <label for="content">投稿内容</label>
                                    <textarea class="form-control" name="content" id="content" style="height: 200px;">{{ old('content') }}</textarea>
                                    </div>
                                </div> 
                                <div class="d-flex justify-content-center mt-3">    
                                    <button type="submit" class="btn btn-primary mt-3">レビュー投稿する</button>
                                </div>
                            </div>                    
                        </form>
                    </div> 
                </div> 
            </div> 
        </main>

@endsection