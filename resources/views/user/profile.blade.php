@extends('layouts.app')
<style type="text/css">
	.profile-img {
		max-width: 150px;
		border: 5px solid #fff;
		border-radius: 25%;
		box-shadow: 1px 2px 2px;
	}
</style>
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
			<small class="pull-right"> 
				<a href="{{url('/profile/'.$user->id.'/edit')}}">Edit</a>
			</small>
				<img class="profile-img" src="http://www.lovemarks.com/wp-content/uploads/profile-avatars/default-avatar-ginger-guy.png">

				<h1>{{$user->name}}</h1>
				<h5>{{$user->email}}</h5>
				<h5>{{$user->dob}} ({{Carbon\Carbon::createFromFormat('Y-m-d',$user->dob)->age}} years old)</h5>
				<button class="btn btn-lg btn-info">Follow</button>
			</div>
		</div>
	</div>
</div>

@endsection