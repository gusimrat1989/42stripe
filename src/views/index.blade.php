<div class="row">

	@foreach( $data as $get )

		<div class="col-md-3">

			<div class="stripe42-image">
				<img style="width: 100px; height:100px" src="{{ $get['image'] }}">
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
