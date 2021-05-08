@extends('layouts.app')

@section('content')

<main id="content">
    <div class="container">

        <h1 class="heading">ユーザー一覧</h1>

        @if (!$users->count())
            <div>ユーザーが見つかりません</div>
        @endif

        <div class="row">
            @foreach ($users as $user)
                <div class="col-sm-6 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text"></p>
                        <a href="/chat/{{ $user->id }}" class="btn btn-primary">Go Chat</a>
                    </div>
                </div>
                </div>
            @endforeach
        </div>  

        <div class="d-flex justify-content-center mt-4">
            {{ $users->appends( request()->input())->links() }}
        </div>
            
    </div>
</main>
@endsection
