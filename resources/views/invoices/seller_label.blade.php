<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HiStore</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
	<style media="all">
		@font-face {
            font-family: 'Roboto';
            src: url("{{ my_asset('fonts/Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Roboto';
            color: #333542;
        }
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}
		.small{
			font-size: .85rem;
		}
		.currency{

		}
	</style>
</head>
<body>
	<div style="margin-left:auto;margin-right:auto;">

		@php
			$generalsetting = \App\GeneralSetting::first();
		@endphp

		<div style="background: #eceff4;padding: 1.5rem;">
			<table>
				<tr>					
					<td class="strong"> <img loading="lazy"  src="{{ my_asset($generalsetting->logo) }}" height="70" style="display:inline-block;">
					</td>
				</tr>
			</table>
			<table>
				@if (Auth::user()->user_type == 'seller')
					<tr>
						<td class="strong">{{ translate('Pengirim') }}:</td>
					</tr>
					<tr>
						<td style="font-size: 1.2rem;" class="strong">{{ Auth::user()->shop->name }}</td>
						<td class="text-right"></td>
					</tr>				
					<tr>
						<td class="gry-color small">Phone: {{ Auth::user()->phone }}</td>
						<td class="text-right"></td>
					</tr>
				@else
					<tr>
						<td style="font-size: 1.2rem;" class="strong">{{ $generalsetting->site_name }}</td>
						<td class="text-right"></td>
					</tr>
					<tr>
						<td class="gry-color small">{{ translate('Phone') }}: {{ $generalsetting->phone }}</td>
						<td class="text-right"></td>
					</tr>
				@endif
			</table>

		</div>

		<div style="padding: 1.5rem;padding-bottom: 0">
			<table>
				@php
					$shipping_address = json_decode($order->shipping_address);
				@endphp
				<tr><td class="strong">{{ translate('Penerima') }}:</td></tr>
				<tr><td class="strong small gry-color">{{ translate('Kepada Yth') }}:</td></tr>
				<tr><td style="font-size: 1.2rem;" class="strong">{{ $shipping_address->name }}</td></tr>
				<tr><td class="gry-color small">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->country }}</td></tr>
				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
			</table>
		</div>
	</div>
</body>
</html>
