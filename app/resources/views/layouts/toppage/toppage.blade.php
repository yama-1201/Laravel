@extends('layouts.app')
@section('content')
        <main class="py-4">

            <!-- 検索 -->
            <div class="d-flex justify-content-center">
                <form action="{{ route('toppage') }}" method="GET" class="mb-4 d-flex">
                    <input type="text" name="keyword" class="form-control me-2" placeholder="キーワードを入力（タイトル・内容・地域）">
                    <select name="rating" class="form-select me-2" style="width: 200px;">
                        <option value="">点数を選択</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}点</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary">検索</button>
                </form>
            </div>


            <div class="row justify-conten-aroud mt-3 mb-2">
                    <button type="button" class="btn btn-primary">+ 収入</button>
                <button type="button" class="btn btn-primary">+ 支出</button>
                </a>
            </div>  
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>収入</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>詳細</th>
                                            <th scope='col'>日付</th>
                                            <th scope='col'>金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ここに収入を表示する -->
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>支出</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>詳細</th>
                                        <th scope='col'>日付</th>
                                        <th scope='col'>金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに支出を表示する -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection