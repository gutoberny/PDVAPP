# Market Management System

This project is a market management system that allows users to perform various operations related to product management and sales. 
It provides functionalities such as product registration, type registration, tax percentage registration, itemized sales display, total purchase value calculation, total tax value calculation, and saving of sales records. The system is built using PHP 7.4 or higher and can utilize either PostgreSQL or MSSQL Server as the database backend.

## Features
- **Product registration**: Users can register new products in the system, providing details such as product name, price, and associated type.
- **Type registration**: Users can register different types for each product, specifying the type's name and the associated tax percentage.
- **Tax percentage registration**: Users can define the tax percentage for each type of product, allowing accurate tax calculations during sales.
- **Sales screen**: The system provides a sales screen where users can enter the purchased products and quantities. It displays the item price multiplied by the quantity, the amount of tax paid for each item, a total purchase value, and a total tax value.
- **Sales record**: The system saves the details of each sale, allowing users to retrieve and analyze them later.

## Installation and Setup

- Clone the repository from GitHub:
```
git clone git@github.com:gutoberny/PDVAPP.git
```

- Start the PHP development server:
```
php -S localhost:8080
```
Access the application in your web browser at [Localhost](http://localhost:8080).

## Dependencies
- PHP 7.4 or higher
- MSSQL Server

> to be continue...
<!-- ## Database Configuration
- Open the config.php file located in the project's root directory.

Modify the database configuration parameters according to your setup:

php
Copy code
$host = 'your-database-host';       // Database server hostname
$database = 'your-database-name';   // Name of the database
$username = 'your-username';        // Username to access the database
$password = 'your-password';        // Password to access the database
Save the changes to the config.php file.

The system will automatically use the provided configuration to connect to the database.

Usage
Access the market management system in your web browser at http://localhost:8080.
Use the provided user interface to perform actions such as product registration, type registration, and sales.
Follow the on-screen instructions and input the required information.
The system will display the relevant results and store the sales records for future reference.
Contributing
If you want to contribute to this project, please follow the guidelines below:

Fork the repository on GitHub.
Create a new branch with a descriptive name for your feature or bug fix.
Commit your changes, adhering to the project's coding conventions.
Push your branch to your forked repository.
Submit a pull request with a detailed description of your changes.
License
This project is licensed under the MIT License. You can find the license information in the LICENSE file.

Contact
If you have any questions or suggestions regarding this project, please feel free to contact us at marketmanagementsystem@example -->
