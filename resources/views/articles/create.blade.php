@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Create Article
			</div>
			<div class="panel-body">
			<form method="Post" action="{{url('/articles')}}"> 
			{{csrf_field()}}
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" class="form-control"></textarea>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="live">Publish
					</label>
				</div>
				<!-- <div class="form-group">
					<label for="post_on">Post On</label>
					<input type="datetime-local" name="post_on" class="form-control" hidden>
				</div> -->
				<input type="submit" class="btn btn-success pull-right">
				</form>
			</div>
		</div>
	</div>
</div>

@endsection