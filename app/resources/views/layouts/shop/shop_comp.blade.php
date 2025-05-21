@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6 text-center">
        <nav class="card mt-5">
          <div class="card-body text-center">店舗登録登録完了しました。</div>
        </nav>  
        <a href="{{ route('showToppage') }}" class="btn btn-primary mt-3">トップ画面へ</a>
        
      </div>
    </div>
  </div>
@endsection