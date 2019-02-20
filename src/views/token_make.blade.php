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
	.stripe42-create-customer
	{
		justify-content: center;
	}

	</style>

	<!---::::: Bootstrap JS :::::-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="row stripe42-create-customer">


				<div class="col-md-6">

					<form action="{{ URL::to( 'stripe42/token/create' ) }}" method="post">
						{!! csrf_field() !!}
					  <div class="form-group">
					    <label for="email">Card Number:</label>
					    <input type="text" class="form-control" id="email" name="number">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Exp Month:</label>
					    <input type="text" class="form-control" id="pwd" name="exp_month">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Exp Year:</label>
					    <input type="text" class="form-control" id="pwd" name="exp_year">
					  </div>
					  <div class="form-group">
					    <label for="pwd">CVC:</label>
					    <input type="text" class="form-control" id="pwd" name="cvc">
					  </div>
					  
					  <button type="submit" class="btn btn-primary	">Submit</button>
					</form>

				</div>


		</div>
	</div>
</body>
</html>	