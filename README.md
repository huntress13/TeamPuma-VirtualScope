
# VirtualScope

## Table of Contents

* [Installation](#installation)
  * [Requirements](#requirements)
  * [Installation Steps](#installation-steps)
  * [Getting Started](#getting-started)
* [Features](#Features)
* [Components](#Components)
  * [Languages](#Languages)
  * [Development Environment](#Development-Environment)
  * [Database](#database)
  * [DBMS](#DBMS)
  * [API](#api)
  * [Frameworks and Libraries](#Frameworks-and-Libraries)
  * [External PLugins](#external-plugins)




## Installation

#### Requirements
* PHP
* Apache server
* MySQL Database
* SQL

> All of these requirements can be completed at once by simply installing a server stack like `Xampp`

#### Installation Steps
1. Import the `DBcreation.sql` file in the `includes` folder into phpMyAdmin. There is no need for any change in the .sql file. This will create the database required for the application to function.

2. Edit the `dbh.inc.php` file in the `includes` folder to create the database connection. Change the password and username to the ones being used within `phpMyAdmin`. There is no need to change anything else.

```php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, 3307);

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}
```
> The port number does not need to be changed under normal circumstances, but if you are running into a problem or the server stack is installed on another port, feel free to change it, but do so carefully. (Example if 3306 is currenlty in used, change current port to 3307)


#### Getting started
The database already contains two pre-made accounts for you to explore around with. If not sufficient, head over to the `signup page` and start making new accounts.
##### Existing Accounts:
```
username: admin
password: admin
```
```
username: user
password: user
```

> **Note:** The GUI files are in the `root directory`, and the `backend files` are present in the `includes` folder. The main HTML structuring files are the `HTML-head.php` and `HTML-footer.php`, which also reside in the includes folder

## Features

* [Registration / Signup System](#registration-signup-system)
* [Login System](#login-system)
* [Profile System](#profile-system)
* [Profile Editing System](#profile-editing-system)
* [Contact System](#contact-system)


## Components

#### Languages
```
PHP 7.3.9
SQL 14.0
HTML5
CSS3
```

#### Development Environment
```
XAMPP
Windows 10
```

#### Database
```
MySQL Database
```

#### DBMS
```
phpMyAdmin 4.9.1
```

#### API
```
MySQLi APIs
```

#### Frameworks and Libraries
```
BootStrap
```

## Details

> Details of important Features of the Application

### Registration / Signup System

* Registration is done through the `signup` page.
* `username` cannot be changed after signing up which exploitable weakness
* `starid` required for registration
* Password needs to be re-entered for additional confirmation
* Passwords `encrypted` before being stored in database so even owners donot have access to them
* Implemented several `authentication methods` to verify user info before registering him.
* Authentication checks for:
  * `empty fields`
  * `invalid username or email`
  * `password mismatch`
  * `SQL errors`
  * `internal server errors`

### Login System

* `username` and `password` required for logging in.
* Authentication checks to return valid error messages.
* Authentication checks for:
  * `wrong username`
  * `wrong password`



### Security

* `Password hashing` before storing in database.
* Filtering of information obtained from `$_GET` and `$_POST` methods to prevent `header injection`.
* Implementation of `MySQLi Prepared Statements` for **advanced** database security.

  **Example:**
```php
$sql = "select uidUsers from users where uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
       }
```
