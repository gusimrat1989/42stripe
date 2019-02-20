<!DOCTYPE html>
<html>
<head>
	<title>42 Stripe</title>

	<!---::::: Bootstrap CSS :::::-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

	<!--::::: Custom Css :::::-->
	<style>

	.stripe42-image img
	{
		width: 200px;
		height: 160px;
	}

	</style>

	<!---::::: Bootstrap JS :::::-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="row">

			@foreach( $data as $get )

				<div class="col-md-3">

					<div class="stripe42-image">
						<img src="{{ $get['image'] }}">
					</div>

					<div class="stripe42-price">
						<span>{{ $get['amount'] }} {{ $get['currency'] }}</span>
					</div>

					<div class="stripe42-buy">

						<form action="{{ URL::to( 'stripe42/charge' ) }}" method="post">

							{!! csrf_field() !!}

							<input type="hidden" name="amount" value="{{ $get['amount'] }}">
							<input type="hidden" name="currency" value="{{ $get['currency'] }}">
							<input type="hidden" name="customer_id" value="{{ $get['customer_id'] }}">
							<input type="submit" class="btn btn-primary" value="Buy">

						</form>

					</div>

				</div>

			@endforeach

		</div>
	</div>
</body>
</html>