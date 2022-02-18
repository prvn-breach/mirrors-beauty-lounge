<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Purchase Invoice </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.svg">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=0">
	<!-- So that mobile will display zoomed in -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- enable media queries for windows phone 8 -->
	<meta name="format-detection" content="telephone=no">
	<!-- disable auto telephone linking in iOS -->

   	<link rel="stylesheet" type="text/css" href="{{ public_path('css/invoice.css') }}">
    <style>
		body
		{
			/*font-family: 'Helios-Antique-medium';  */
			font-family: Segoe UI;
			-webkit-print-color-adjust: exact; 
		}

		/*@font-face{font-family: 'Kessel_105 W00 Bold'; src:url(fonts/Kessel105-Bold.otf);}
		@font-face{font-family: 'Kessel_105 W00 Heavy'; src:url(fonts/Kessel105-Heavy.otf);}
		@font-face {font-family: 'Helios-Antique-medium'; src: url(fonts/Helios-Antique-Helios-Antique-Medium.otf);}
		@font-face {font-family: 'Helios-Antique-bold'; src: url(fonts/Helios-Antique-Helios-Antique-bold.otf);}*/

	</style>
</head>

<body style="background-color: #ffffff;">
	<table style="width: 800px; margin: 0 auto; border: 1px solid #e7e7e7;">
		<tr>
			<td>
				<table style=" width: 800px; margin: 0 auto; float: none;">
					<tr>
						<td style="background-color: #ffffff; padding: 25px 0; text-align: center;">
							<img src="{{ public_path('images/mirrors_logo.jpg') }}" alt="" style="width: 150px;">
						</td>
					</tr>
					<tr>
						<td style="font-size: 13px; text-transform: uppercase; background-color: #ffffff; text-align: center;color: #000000; padding: 0 0 25px 0;
font-weight: 500; ">
							Purchase Invoice
						</td>
					</tr>
				</table>

				<table style=" width: 800px; margin: 0 auto; float: none;">
					<tr> 
						<td>
							<table style="    width: 750px;  margin: 30px auto 30px auto;">
								<tr>
									<td style="background-color: #efecec; padding: 15px;font-size: 13px;  width: 450px text-align: left;border-right: 2px solid #ffffff; border-bottom: 2px solid #ffffff;"> 
										Name :  <strong>{{ $order['getUser']['name'] }} </strong>
									</td>
									<td style="background-color: #efecec; width: 300px; font-size: 13px;  padding: 15px; text-align: left; border-bottom: 2px solid #ffffff;"> 
										Payment Type : <strong>{{ $order['getPayment']['payment_mode'] }} </strong>
									</td>
								</tr>
								<tr>
									<td style="background-color: #efecec;font-size: 13px;  padding: 15px; width: 450px text-align: left;border-right: 2px solid #ffffff; border-bottom: 2px solid #ffffff;"> 
										Invoice No :  <strong>{{ $order['getPayment']['payment_mode'] }} </strong>
									</td>
									<td style="background-color: #efecec; font-size: 13px; width: 300px; padding: 15px; text-align: left; border-bottom: 2px solid #ffffff;"> 
										Date :  <strong> {{ date('Y/m/d') }} </strong>
									</td>
								</tr>
								<tr>
									<td style="background-color: #efecec; font-size: 13px;  padding: 15px; width: 450px text-align: left;border-right: 2px solid #ffffff; border-bottom: 2px solid #ffffff;"> 
										Mobile No :  <strong> {{ $order['getUser']['mobile'] }} </strong>
									</td>
									<td style="background-color: #efecec; font-size: 13px;  width: 300px; padding: 15px; text-align: left; border-bottom: 2px solid #ffffff;"> 
										Total Products : <strong> {{ count($order['getItems']) }} </strong>
									</td>
								</tr>

								<tr>
									<td style="background-color: #efecec; font-size: 13px;  padding: 15px; width: 450px text-align: left;border-right: 2px solid #ffffff; border-bottom: 2px solid #ffffff;"> 
										Order Status :  <strong> {{ $statuses[$order['getStatusShipping']['status']] }} </strong>
									</td>
								</tr>

							</table>
						</td>
					</tr>
				</table>

				<table style="width: 800px; margin: 0 auto; float: none;">
					<tr>
						<td>
							<table style="background: #000000; width: 750px; margin: 0 auto;">
								<tr style="border: 1px solid #e7e7e7;"> 
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; font-size: 13px;padding: 15px; width: 100px; text-align: left;  border-bottom: 1px solid #ffffff;"> 
										Sr No
									</td> 
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; font-size: 13px; width: 500px; padding: 15px; text-align: left;   border-bottom: 1px solid #ffffff;"> 
										Products
									</td>
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; font-size: 13px; width: 150px; padding: 15px; text-align: left; border-bottom: 1px solid #ffffff;"> 
										Amount 
									</td> 
								</tr> 
							</table>
                            @foreach($order['getItems'] as $index => $item)
							<table style="background: #000000; width: 750px; margin: 0 auto;">
								<tr> 
									<td style="background-color: #efecec; color: #000000; font-size: 13px; padding: 15px; width: 100px text-align: left;  border-bottom: 1px solid #ffffff;"> 
										{{ $index+1 }}
									</td> 
									<td style="background-color: #efecec; color: #000000; line-height: 25px; font-size: 13px; width: 500px; padding: 15px; text-align: left;   border-bottom: 1px solid #ffffff;"> 
										<span>{{ $item['product_name'] }} </span> <br>
										<b>{{ $item['quantity'] }}</b> x <b>AED {{ $item['price'] }}</b>
									</td>
									<td style="background-color: #efecec; color: #000000; font-size: 13px; width: 150px; padding: 15px; text-align: left; border-bottom: 1px solid #ffffff;"> 
										<b>AED {{ $item['quantity'] * $item['price'] }} </b>
									</td> 
								</tr> 
							</table>
                            @endforeach
							<table style="background: #000000; width: 750px; margin: 0 auto;">
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 15px; width: 600px;border-bottom: 1px solid #E7E7E7; border-left: 1px solid #E7E7E7; text-align: right; "> 
										Subtotal
									</td> 
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; line-height: 25px; font-size: 13px;border-bottom: 1px solid #E7E7E7; border-right: 1px solid #E7E7E7; width: 150px; padding: 15px; text-align: left;  "> 
										AED {{ $order['getPayment']['sub_total'] }}
									</td> 
								</tr> 
							</table>
							<table style="background: #000000; width: 750px; margin: 0 auto;">
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 15px; width: 600px;border-bottom: 1px solid #E7E7E7; border-left: 1px solid #E7E7E7; text-align: right; "> 
										VAT 
									</td> 
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; line-height: 25px; font-size: 13px;border-bottom: 1px solid #E7E7E7; border-right: 1px solid #E7E7E7; width: 150px; padding: 15px; text-align: left; "> 
										AED {{ $order['getPayment']['vat'] }}
									</td> 
								</tr> 
							</table>
                            <table style="background: #000000; width: 750px; margin: 0 auto;">
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 15px; width: 600px;border-bottom: 1px solid #E7E7E7; border-left: 1px solid #E7E7E7; text-align: right; "> 
										Shipping 
									</td> 
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; line-height: 25px; font-size: 13px;border-bottom: 1px solid #E7E7E7; border-right: 1px solid #E7E7E7; width: 150px; padding: 15px; text-align: left; "> 
										AED {{ $order['getPayment']['shipping'] }}
									</td> 
								</tr> 
							</table>
                            <table style="background: #000000; width: 750px; margin: 0 auto;">
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 15px; width: 600px;border-bottom: 1px solid #E7E7E7; border-left: 1px solid #E7E7E7; text-align: right; "> 
										Delivery 
									</td> 
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; line-height: 25px; font-size: 13px;border-bottom: 1px solid #E7E7E7; border-right: 1px solid #E7E7E7; width: 150px; padding: 15px; text-align: left; "> 
										AED {{ $order['getPayment']['delivery_charge'] }}
									</td> 
								</tr> 
							</table>
							<table style="background: #000000; width: 750px; margin: 0 auto;">
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 15px; width: 600px;border-bottom: 1px solid #ffffff; border-left: 1px solid #e7e7e7; text-align: right;"> 
										Total Amount
									</td> 
									<td style="font-weight: 700; background-color: #ffffff; color: #000000; line-height: 25px; font-size: 13px;border-bottom: 1px solid #ffffff; border-right: 1px solid #e7e7e7; width: 150px; padding: 15px; text-align: left;"> 
										{{ $order['getPayment']['total'] }} AED
									</td> 
								</tr> 
							</table>

							<table style="background: #000000; width: 750px; margin: 0 auto 30px auto; border:1px solid #e7e7e7;">
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 40px 0 0 0; width: 800px; text-align: center;">
										M03-Buhaleeba Plaza- Dominos Pizza Building Muraqqabat Road,Deira,Dubai PO Box-20127, Dubai, 20127
									</td>   
								</tr>
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 10px 0; width: 800px; text-align: center;">
										+971 4 269 1449  /  info@mirrorsbeautylounge.com
									</td>   
								</tr> 
								<tr> 
									<td style="background-color: #ffffff; color: #000000; font-size: 13px; padding: 0 0 40px 0; width: 800px; text-align: center;">
										 www.mirrorsbeautylounge.com
									</td>   
								</tr> 
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>