@extends('layouts.app')
@section('content')

<div class="row">
@forelse($articles as $article)

	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span><?php
$user = App\User::find($article->user_id);
echo $user->name;
?></span>
				<span class="pull-right"> {{ $article->created_at->diffForHumans() }} </span>
			</div>
			<div class="panel-body">
				{{ substr($article->content, 0, 100)  }} ...
				<a href="{{url('/articles/'.$article->id)}}">Read more</a>
			</div>
		<div class="panel-footer clearfix" style="background-color: white;">
		@if($article->user_id == Auth::id())
		<form action="{{url('/articles/'.$article->id)}}" method="post" class="pull-right" style="margin-left: 20px">
		{{csrf_field()}}
		{{method_field('DELETE')}}
			<button class="btn btn-danger btn-sm">
				Delete
			</button>
		</form>
		@endif
			<i class="fa fa-heart pull-right"></i>
		</div>
		</div>
	</div>
@empty
no articles
@endforelse

</div>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		{{$articles->links()}}
	</div>
</div>
@endsection