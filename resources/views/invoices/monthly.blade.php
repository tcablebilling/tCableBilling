<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{{date('F Y')}}</title>
		<style type="text/css" media="screen">
			#logo {
				text-align:center;
			}
			h1 {
				text-align:center;
			}
			table td,
			table th {
				text-align:left;
			}
			#company div,
			#project div,
			table th {
				white-space:nowrap;
				text-transform: uppercase;
			}
			h1,
			table th {
				font-weight:400;
				color:#5D6975;
			}
			h1,
			table td.grand {
				border-top:1px solid #5D6975;
			}
			#project span,
			a,
			footer,
			h1,
			table th {
				color:#5D6975;
			}
			.clearfix:after {
				content:"";
				display:table;
				clear:both;
			}
			a {
				text-decoration:underline;
			}
			body {
				position:relative;
				width:18cm;
				height:29.7cm;
				margin:0 auto;
				color:#001028;
				background:#FFF;
				font-size:12px;
				font-family: Courier;
			}
			header {
				padding:10px 0;
				margin-bottom:30px;
			}
			#logo {
				margin-bottom: 10px;
			}
			#logo img {
				width: 90px;
			}
			h1 {
				border-bottom:1px solid #5D6975;
				font-size:2.4em;
				line-height:1.4em;
				margin:0 0 20px;
				background: #F5F5F5;
			}
			#project {
				float:left;
				margin-left: 13px;
			}
			#project span {
				text-align:right;
				width:52px;
				margin-right:10px;
				display:inline-block;
				/*font-size:.8em;*/
				font-size: 12px;
			}
			#company {
				text-align:right;
				position:absolute;
				left:80%;
			}
			table {
				width:100%;
				border-collapse:collapse;
				border-spacing:0;
				margin-bottom:20px;
			}
			table tr:nth-child(2n-1) td {
				background:#F5F5F5;
			}
			table th {
				padding:5px 10px;
				border-bottom:1px solid #C1CED9;
				font-weight: bolder;
			}
			table .desc,
			table .service {
				text-align:left;
			}
			table td {
				padding:10px;
				text-align:left;
			}
			table td.desc,
			table td.service {
				vertical-align:top;
			}
			table td.qty,
			table td.total,
			table td.unit {
				font-size:1.2em;
			}

			.sign-area {
				position: relative;
				display: block;
				padding: 105px 0px 85px 0px;
			}

			.collector-sign {
				position:absolute;
				left:0;
			}

			.collector-sign span {
				display: block;
			}

			.client-sign {
				position:absolute;
				right:0
			}

			.client-sign span {
				display: block;
				text-align: right;
			}

			#notices .notice {
				color:#5D6975;
				font-size:1.2em;
			}

			div#copyright {
				width: 100%;
				height: 30px;
				border-top: 1px solid #C1CED9;
				padding: 8px 0;
				text-align: center;
				position: absolute;
				top: 600px;
			}

			.slip {
				position: absolute;
				bottom: 250px;
			}

			.slip .sign-area {
				bottom: -80px;
			}

			footer {
				width:100%;
				height:30px;
				position:absolute;
				bottom:0;
				border-top:1px solid #C1CED9;
				padding:8px 0;
				text-align:center;
			}
			.page-break {
				page-break-after:always;
			}
		</style>
	</head>
	<body>
	<!-- This $i variable is very important. Don't delete it.-->
	{{--*/ $i = 0 /*--}}
		@foreach($billings as $key_billing => $billing)
			<!-- This $i variable is very important. Don't delete it.-->
			{{--*/ $i++ /*--}}
			<header class="clearfix">
			    <h1>BILL ID:{{sprintf("%'.05d\n", $billing->id)}}</h1>
			    <div id="company" class="clearfix">
			        <div>Company Name</div>
			        <div>455 Foggy Heights,<br/> AZ 85004, US</div>
			        <div>(602) 519-0450</div>
			        <div><a href="mailto:company@example.com">company@example.com</a></div>
			    </div>
			    <div id="project">
			        <div><span>ID</span> {{$billing->clientDetails->area_name->code . '-' . sprintf("%'.03d\n", $billing->clientDetails->id)}}</div>
			        <div><span>CLIENT</span> {{$billing->clientDetails->name}}</div>
			        <div><span>ADDRESS</span> {{$billing->clientDetails->address}}</div>
			        <div><span>PHONE</span> {{$billing->clientDetails->phone_no_1}}</div>
			        <div><span>DATE</span> {{date('F j, Y')}}</div>
			        <div><span>BILL FOR</span> {{date('F Y', strtotime($billing->month))}}</div>
			    </div>
			</header>
			<main>
			    <table>
			        <thead>
			            <tr>
			                <th class="desc">Bill Amount</th>
			                <th>Cumulative Bill</th>
			                <th>Paid Amount</th>
			                <th>Cumulative Paid</th>
			                <th>Total</th>
			            </tr>
			        </thead>
			        <tbody>
			            <tr>
			                <td class="unit">{{$billing->bill_amount}}</td>
			                <td class="qty">{{ $bill_cum = $billing->getBillCumulativeSum() }} TK </td>
			                <td class="total">{{ $billing->clientPayments->sum('paid_amount') }} TK </td>
			                <td class="total">{{ $paid_cum = $billing->getPaidCumulativeSum() }} TK </td>
			                <td class="total">{{ $bill_cum - $paid_cum }}</td>
			            </tr>
			            <tr>
			                <td colspan="4" class="grand total">GRAND TOTAL</td>
			                <td class="grand total">{{ $bill_cum - $paid_cum }}</td>
			            </tr>
			        </tbody>
			    </table>
				<div class="sign-area">
					<div class="collector-sign">
						<span>
							================================
						</span>
						<span>
							Collector Sign
						</span>
					</div>
					<div class="client-sign">
						<span>
							================================
						</span>
						<span>
							Client Sign
						</span>
					</div>
				</div>
			    <div id="notices">
			        <div>NOTICE:</div>
			        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
			    </div>
				<div id="copyright">
					Copyright &copy; {{date('Y')}} All Rights Reserved. tCableBilling, an automated billing system.
				</div>
				<div class="slip">
					<span>
						================================================================================================
					</span>
					<h1>BILL ID:{{sprintf("%'.05d\n", $billing->id)}}</h1>
					<div id="company" class="clearfix">
						<div>Company Name</div>
						<div>455 Foggy Heights,<br/> AZ 85004, US</div>
						<div>(602) 519-0450</div>
						<div><a href="mailto:company@example.com">company@example.com</a></div>
					</div>
					<div id="project">
						<div><span>ID</span> {{$billing->clientDetails->area_name->code . '-' . sprintf("%'.03d\n", $billing->clientDetails->id)}}</div>
						<div><span>CLIENT</span> {{$billing->clientDetails->name}}</div>
						<div><span>ADDRESS</span> {{$billing->clientDetails->address}}</div>
						<div><span>PHONE</span> {{$billing->clientDetails->phone_no_1}}</div>
						<div><span>DATE</span> {{date('F j, Y')}}</div>
						<div><span>BILL FOR</span> {{date('F Y', strtotime($billing->month))}}</div>
					</div>
					<div class="sign-area">
						<div class="collector-sign">
						<span>
							================================
						</span>
							<span>
							Collector Sign
						</span>
						</div>
						<div class="client-sign">
						<span>
							================================
						</span>
							<span>
							Client Sign
						</span>
						</div>
					</div>
				</div>
			</main>
			<footer>Copyright &copy; {{date('Y')}} All Rights Reserved. tCableBilling, an automated billing system.</footer>
			@if( $i != count($billings))
				<div class="page-break"></div>
			@endif
		@endforeach
	</body>
</html>
