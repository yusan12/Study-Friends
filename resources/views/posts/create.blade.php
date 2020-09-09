@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <h1>新規投稿ページ</h1>
            <div class="card text-center">
                <div class="card-header">
                    Blogs
                </div>
            <div class="card-body">
                <h5 class="card-title">タイトル:</h5>
                <p class="card-text">内容:</p>
                <a href="" class="btn btn-primary">詳細</a>
            </div>
            <div class="card-footer text-muted">
                投稿日:
            </div>
            </div> -->

            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{ route('posts.store') }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <div class="form-group">
                <label>リンク</label>
                    <input type="text" class="form-control" placeholder="リンク先を入力してください" value="{{old('link')}}" name="link">
                </div>
                <button type="submit" class="btn btn-primary">作成する</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection