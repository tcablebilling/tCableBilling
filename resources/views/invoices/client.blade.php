<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style type="text/css" media="screen">#logo{text-align: center;}h1{text-align: center;}table td,table th{text-align:left}#company div,#project div,table th{white-space:nowrap}h1,table th{font-weight:400;color:#5D6975}h1,table td.grand{border-top:1px solid #5D6975}#project span,a,footer,h1,table th{color:#5D6975}.clearfix:after{content:"";display:table;clear:both}a{text-decoration:underline}body{position:relative;width:18cm;height:29.7cm;margin:0 auto;color:#001028;background:#FFF;font-size:12px;font-family:Arial;}header{padding:10px 0;margin-bottom:30px}#logo{margin-bottom:10px}#logo img{width:90px}h1{border-bottom:1px solid #5D6975;font-size:2.4em;line-height:1.4em;margin:0 0 20px;background:url(invoice/dimension.png)}#project{float:left; width: 40%;}#project span{text-align:right;width:52px;margin-right:10px;display:inline-block;font-size:.8em}#company{text-align: right;position: absolute;left: 80%;}table{width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:20px}table tr:nth-child(2n-1) td{background:#F5F5F5}table th{padding:5px 10px;border-bottom:1px solid #C1CED9}table .desc,table .service{text-align:left}table td{padding:10px;text-align:left}table td.desc,table td.service{vertical-align:top}table td.qty,table td.total,table td.unit{font-size:1.2em}#notices .notice{color:#5D6975;font-size:1.2em}footer{width:100%;height:30px;position:absolute;bottom:0;border-top:1px solid #C1CED9;padding:8px 0;text-align:center}</style>
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="invoice/logo.png">
    </div>
    <h1>INVOICE 3-2-1</h1>
    <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br/> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
    </div>
    <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">Bill ID</th>
            <th>Month</th>
            <th class="desc">Bill Amount</th>
            <th>Payment ID</th>
            <th>Paid Amount</th>
            <th>Date</th>
            <th>Due</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="service">Design</td>
            <td class="desc">March, 2010</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$3,200.00</td>
            <td class="total">$1,040.00</td>
            <td class="total">$1,040.00</td>
        </tr>
        <tr>
            <td class="service">Development</td>
            <td class="desc">March, 2010</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
            <td class="total">$3,200.00</td>
            <td class="total">$3,200.00</td>
        </tr>
        <tr>
            <td class="service">SEO</td>
            <td class="desc">March, 2010</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$3,200.00</td>
            <td class="total">$800.00</td>
            <td class="total">$800.00</td>
        </tr>
        <tr>
            <td class="service">Training</td>
            <td class="desc">March, 2010</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$3,200.00</td>
            <td class="total">$160.00</td>
            <td class="total">$160.00</td>
        </tr>
        <tr>
            <td colspan="6">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
        </tr>
        <tr>
            <td colspan="6">TAX 25%</td>
            <td class="total">$1,300.00</td>
        </tr>
        <tr>
            <td colspan="6" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
        </tr>
        </tbody>
    </table>
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div>
</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>
