<p align="center">
  <img src="https://raw.githubusercontent.com/rnaby/tCableBilling/master/public/images/tcablebilling.png" alt="Sublime's custom image"/>
</p>

# tCableBilling<sup>®</sup>

[![Build Status](https://travis-ci.org/rnaby/tCableBilling.svg?branch=master)](https://travis-ci.org/rnaby/tCableBilling)

## [Localhost](https://github.com/rnaby/tCableBilling) | [Server Host](https://github.com/rnaby/tCableBilling)

Right now I'll suggest you to host this application on your localhost. In future I'll release a web host version. This application will also run smoothly on server also, but it is not recommended. For any support or assistance please email  me naby88@gmail.com.

## Description
It is a recurring billing application for generating monthly subscription bill cable TV network clients, developed with Laravel 5.2.

### Modules
* Customer Module
* Order Module
* Product Module
* Refund Module
* Stock Module
* Store Module
* Supplier Module
* User Module

## Database Design
<img src="https://raw.githubusercontent.com/rnaby/tCableBilling/master/public/images/db_tcablebilling.png" alt="Sublime's custom image"/>
## Installation
<code>Composer</code> must be installed in your system for installing this software.
### 1. Step One
Clone this repository to your localhost or server directory.
<pre>$ git clone git@github.com:rnaby/tCableBilling.git /to/your/path</pre>
or
<pre>$ git clone https://github.com/rnaby/tCableBilling.git /to/your/path</pre>

### 2. Step Two
Now rename the <code>.env.example</code> to <code>.env</code> and fill that file with necessary information.

### 3. Step Three
Now go to this software root directory. After going there run <pre>$ composer install</pre> and wait some time while the composer download and install needed packages.

### 4. Step Four
Now run <code>$ php artisan migrate</code> for migrating the database

### 5. Final Step
Now go to your favourite browser and try to access the software through that browser.

## Requirements
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* MySQL / Sqlite3
* Apache/NGINX
* MySQL
* GD Extension

## Features
* Built using Laravel 5.2
* Live PDF generation using [domPDF](https://dompdf.github.io/)
* Recurring invoices with auto-billing
* Manage multiple store
* Inventory management
* Daily, weekly and monthly report generation
* Multi-user support
* Tax rates and payment terms
* Discount management
* Partial payments
* Due management
* Supplier management

## Contributing
All contributors are welcome!  
For information on how contribute to tCableBilling<sup>®</sup>, please contact me at naby88@gmail.com.

## Donation
Any kinds of donations are welcome!  
For information on how donate to tCableBilling<sup>®</sup>, please contact me at naby88@gmail.com.

## License
tCableBilling<sup>®</sup> is released under the Attribution Assurance License.  
See [LICENSE](LICENSE) for details.
