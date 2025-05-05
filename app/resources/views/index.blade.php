@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">投稿一覧</div>

        <div class="card-body">
          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>タイトル</th>
                  <th>本文</th>
                  <th>状態</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($reviews))
                @foreach ($reviews as $review)
                <tr>
                  <td>{{ $review->title }}</td>
                  <td>{{ $review->content }}</td>
                  <td>{{ $review->rating }}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection