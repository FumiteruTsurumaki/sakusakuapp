@extends('layouts.sakusaku')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログインしました！</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="log_cre" href="/create1">サクッと作る</a>
                    <br>
                    <a href="/">トップに戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
