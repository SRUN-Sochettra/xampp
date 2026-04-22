# Local PHP Web Applications (XAMPP)

A centralized repository containing multiple full-stack PHP web applications and utility modules developed for local execution via XAMPP. 

## Included Projects

### 1. Student Information System (`/sis`)
A comprehensive management system for academic records.
* **Architecture**: PHP, MySQL, AdminLTE dashboard.
* **Features**:
    * Course and department management.
    * Student academic status tracking.
    * Pricing and fee structure management.
    * Admin and user access controls.
* **Database Initialization**: Import `sis/database/sis_db.sql`.

### 2. Inventory Management System (`/inventory-management-system`)
A tracking system for stock, purchases, and sales.
* **Architecture**: PHP, MySQL, Bootstrap.
* **Features**:
    * Vendor and customer management.
    * Stock item tracking with image uploads.
    * Sale and purchase order logging.
    * Data reporting and search table generation.
* **Database Initialization**: Import `inventory-management-system/inc/config/shop_inventory.sql`.

### 3. Authentication Module (`/Register`)
Standalone user authentication system.
* **Features**: Registration, login session handling, and connection routing.

### 4. Data Visualization (`/showdata`)
Utility module for processing and displaying database records in tabular formats.

## Technologies Used
* **Backend**: PHP 
* **Database**: MySQL / MariaDB (via phpMyAdmin)
* **Frontend**: HTML5, CSS3, JavaScript
* **Libraries/Frameworks**: Bootstrap, jQuery, AdminLTE, DataTables, Chart.js

## Deployment Instructions

1.  **Environment Setup**: Install [XAMPP](https://www.apachefriends.org/index.html).
2.  **Clone Repository**: Clone this repository into the XAMPP web root directory (`xampp/htdocs/`).
3.  **Database Configuration**:
    * Start Apache and MySQL services in the XAMPP Control Panel.
    * Navigate to `http://localhost/phpmyadmin`.
    * Create the required databases for the specific projects.
    * Import the respective `.sql` dump files located in the project directories.
4.  **Execution**: Access the applications via `http://localhost/{project_directory_name}`.

## Developer
* **Author**: Srun Sochettra
* **GitHub**: [SRUN-Sochettra](https://github.com/SRUN-Sochettra)
