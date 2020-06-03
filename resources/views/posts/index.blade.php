@extends('layouts.app')

@section('content')
<div class="card-body">
<div class="container">
    <div class="row">    
        <div class="col-xs-8 col-xs-offset-2">
				<h5 class="card-title">検索フォーム</h5>
				<div id="custom-search-input">
				<div class="card text-center">
		    <div class="input-group">
				<form action="{{ route('posts.search') }}" method="POST">
							@csrf
                <!-- <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Contains</a></li>
                      <li><a href="#its_equal">It's equal</a></li>
                      <li><a href="#greather_than">Greather than ></a></li>
                      <li><a href="#less_than">Less than < </a></li>
                      <li class="divider"></li>
                      <li><a href="#all">Anything</a></li>
                    </ul>
                </div>
								
                <input type="hidden" name="search_param" value="all" id="search_param">          -->
                <input type="text" class="form-control" name="x" placeholder="Search term..." name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
										<!-- <span class="glyphicon glyphicon-search"> -->
										<i class="fas fa-search"></i>
										</button>
										</span>
										</form>
										
                </span>
            </div>
            </div>
						</div>
        </div>
	</div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
				<h1>一覧ページ</h1>
				<a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
				<div class="card text-center">
					<div class="card-header">
						Blogs
					</div>
					@foreach ($posts as $post)
                <div class="card-body">
                    <h5 class="card-title">タイトル：{{ $post->title }}</h5>
										<p class="card-text">内容：{{ $post->body }}</p>
										<p class="card-text">投稿者:{{ $post->user->name }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
										<div class="row justify-content-center">
											@if($post->users()->where('user_id', Auth::id())->exists())
											<div class="col-md-3">
												<form action="{{ route('unfavorites', $post) }}" method="POST">
													@csrf
													<input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
												</form>
											</div>
											@else
											<div class="col-md-3">
													<form action="{{ route('favorites', $post) }}" method="POST">
															@csrf
															<input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
													</form>
											</div>			
											@endif
								</div>
								<div class="row justify-content-center">
									<p>いいね数：{{ $post->users()->count() }}</p>
							</div>
						</div>
								<div class="card-footer text-muted">
										投稿日時：{{ $post->created_at }}
								</div>
								@endforeach
							</div>
        </div>
    </div>
</div>
@endsection