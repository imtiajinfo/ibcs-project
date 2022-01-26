@if(session('successMsg'))

	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<i class="material-icons">close</i>
		</button>
		<span><strong>Success {{ session('successMsg') }}</strong></span>
	</div>

@endif

@if($errors->any())
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<i class="material-icons">close</i>
			</button>
			<span><strong>Danger {{ $error }}</strong></span>
		</div>
	@endforeach
@endif