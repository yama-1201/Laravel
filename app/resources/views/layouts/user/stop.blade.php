@extends('layouts.app')
@section('content')
        <main class="py-4">
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="text-center">
                            <p>あなたは管理者により、利用停止されました。</p>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('showToppage') }}" class="btn btn-primary mt-3">トップ画面へ</a>
                        </div>
                    </div>
                </div>
            </div>   
        </main>
@endsection