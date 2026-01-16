# Daily Expense Tracker

## Brief

Daily Expense Tracker is a lightweight PHP/MySQL web application that allows users to register, log in, and record personal expenses. The application provides per-user expense CRUD (create, read, update, delete), dashboard summaries (today, yesterday, last 7 days, month, year), and basic report pages (date-wise, month-wise, year-wise).

## Key Features

* User registration and login (email + password)
* Add, update, delete expenses tied to a user account
* Dashboard with aggregated expense summaries
* Detailed reports by date, month, and year
* Simple Bootstrap UI and client-side date controls
* Database schema included (SQL dump)

## Tech Stack

* PHP (server-side)
* MySQL / MariaDB (database)
* Bootstrap, jQuery (frontend)
* Tested on XAMPP (Apache + PHP + MySQL)

## Prerequisites

* Windows / Linux / macOS with Apache + PHP + MySQL (XAMPP recommended)
* PHP 7.0 or higher (project uses mysqli)
* Import privileges to create the `detsdb` database

## Installation & Setup

1. Copy the project folder into your web root (for XAMPP: `C:\xampp\htdocs\`).

2. Start Apache and MySQL from the XAMPP Control Panel.

3. Import the database file `Daily Expense Tracker Project/SQL File/detsdb.sql` using phpMyAdmin or the MySQL CLI:

   ```sql
   SOURCE path/to/detsdb.sql;
   ```

4. Verify database credentials in `dets/includes/dbconnection.php` (default: `localhost`, `root`, empty password, database name `detsdb`).

5. Open the application in your browser:

   * `http://localhost/dets/`
   * or `http://localhost/dets/index.php`

## Quick Usage / Demo Steps

1. Register a user by opening `register.php` and creating an account.
2. Log in via `index.php` using your email and password. After login, you will be redirected to `dashboard.php`.
3. Add expenses using `add-expense.php` (date, item, cost).
4. Manage expenses in `manage-expense.php`, where you can view, update, or delete records.
5. View summaries on the dashboard and detailed reports on the report pages.
6. Log out using the `logout.php` link.

## Important Files

* `dets/includes/dbconnection.php` — database connection configuration.
* `dets/register.php` — user registration form and logic.
* `dets/index.php` — login form and authentication.
* `dets/dashboard.php` — user dashboard with summaries.
* `dets/add-expense.php` — add expense form.
* `dets/manage-expense.php` — list, edit, and delete expenses.
* `Daily Expense Tracker Project/SQL File/detsdb.sql` — database schema and sample data.

## Customization

* Extend the `tbluser` table to include additional fields such as profile picture or status.
* Modify the UI using Bootstrap to match your preferred design.
* Add new expense categories or reports as needed.

---

Daily Expense Tracker Project README
