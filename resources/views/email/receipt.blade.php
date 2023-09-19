<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Receipt</title>
	<style>
		.text-danger strong {
				color: #9f181c;
			}
			.receipt-main {
				background: #ffffff none repeat scroll 0 0;
				border-bottom: 12px solid #333333;
				border-top: 12px solid #9f181c;
				margin-top: 50px;
				margin-bottom: 50px;
				padding: 40px 30px !important;
				position: relative;
				box-shadow: 0 1px 21px #acacac;
				color: #333333;
				font-family: open sans;
			}
			.receipt-main p {
				color: #333333;
				font-family: open sans;
				line-height: 1.42857;
			}
			.receipt-footer h1 {
				font-size: 15px;
				font-weight: 400 !important;
				margin: 0 !important;
			}
			.receipt-main::after {
				background: #414143 none repeat scroll 0 0;
				content: "";
				height: 5px;
				left: 0;
				position: absolute;
				right: 0;
				top: -13px;
			}
			.receipt-main thead {
				background: #414143 none repeat scroll 0 0;
			}
			.receipt-main thead th {
				color:#fff;
			}
			.receipt-right h5 {
				font-size: 16px;
				font-weight: bold;
				margin: 0 0 7px 0;
			}
			.receipt-right p {
				font-size: 12px;
				margin: 0px;
			}
			.receipt-right p i {
				text-align: center;
				width: 18px;
			}
			.receipt-main td {
				padding: 9px 20px !important;
			}
			.receipt-main th {
				padding: 13px 20px !important;
			}
			.receipt-main td {
				font-size: 13px;
				font-weight: initial !important;
			}
			.receipt-main td p:last-child {
				margin: 0;
				padding: 0;
			}	
			.receipt-main td h2 {
				font-size: 20px;
				font-weight: 900;
				margin: 0;
				text-transform: uppercase;
			}
			.receipt-header-mid .receipt-left h1 {
				font-weight: 100;
				margin: 34px 0 0;
				text-align: right;
				text-transform: uppercase;
			}
			.receipt-header-mid {
				margin: 24px 0;
				overflow: hidden;
			}
			
			#container {
				background-color: #dcdcdc;
			}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			
			<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" style="position: relative; margin-left: auto; margin-right: auto;">
				<div class="row">
					<div class="receipt-header row" style="width: 100%;">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="receipt-left">
								<img class="img-responsive" alt="2K" src="https://supermart-test.herokuapp.com/images/custom/logo.png" style="width: 150px;">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-right">
							<div class="receipt-right">
								<h4><b> 2K Supermart</b></h4>
								<p>(+234) 815 237 2923 <i class="fa fa-phone"></i></p>
								<p>info@mydomain.com <i class="fa fa-envelope-o"></i></p>
								<p>69 Alex Ekwueme Way, Kado, Abuja <i class="fa fa-location-arrow"></i></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="receipt-header receipt-header-mid row" style="width: 100%">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							<div class="receipt-right">
								<h6>Name: {{ $order['0']->firstName }} {{ $order['0']->lastName }}</h6>
								<p><b>Payment ref :</b> {{ $order['0']->paymentReference }}</p>
								<p><b>Mobile :</b> {{ $order['0']->phoneNumber }}</p>
								<p><b>Email :</b> {{ $order['0']->email }}</p>
								<p><b>Address :</b> {{ $order['0']->address }}</p>
								<p>
								 @if ($order['0']->coupon != null)
									<b>Coupon Code :</b> {{ $order['0']->coupon }}
								 @endif
								</p>
							</div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4">
							<div class="receipt-left">
								<h1 style="font-size: 2em">Receipt</h1>
							</div>
						</div>
					</div>
				</div>
				
				<div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Product</th>
								<th>Quantity</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							@php
								$total = 0;
							@endphp
							@foreach ($order['0']->orders as $item)
								<tr>
									<td class="col-md-6">{{ $item->product }}</td>
									<td class="col-md-3">{{ $item->quantity * $item->unit_qty }}</td>
									<td class="col-md-3"><i class="fa fa-inr"></i> ₦{{ number_format($item->price * $item->quantity) }}</td>
								</tr>
								@php
									$total += $item->price * $item->quantity;
								@endphp
							@endforeach
						   
								@if ($order['0']->coupon_discount != null)
									<tr> 
										<td></td>
										<td><h6><strong>Discount: </strong></h6></td>
										<td class="text-left text-danger"><h6><strong><i class="fa fa-inr"></i> ₦{{ number_format($order['0']->coupon_discount) }} OFF</strong></h6></td>
									</tr>
								@endif
							
							<tr> 
								<td></td>
								<td class="text-right"><h4><strong>Total: </strong></h4></td>
								<td class="text-left text-danger"><h4><strong><i class="fa fa-inr"></i> ₦{{ number_format($total - $order['0']->coupon_discount) }}</strong></h4></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="receipt-header receipt-header-mid receipt-footer row" style="width: 100%">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							<div class="receipt-right">
								<h5 style="color: rgb(140, 140, 140);">Thank you for your patronage!</h5>
								{{-- <p><b>Date :</b> {{ date }}</p> --}}
							</div>
						</div>
						<!-- <div class="col-xs-4 col-sm-4 col-md-4">
							<div class="receipt-left">
								<h1 style="font-size: 1em">Signature</h1>
							</div>
						</div> -->
					</div>
				</div>
				
			</div>    
		</div>
	</div>
	
	
</body>
</html>

