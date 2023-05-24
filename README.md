<p align="center"><a href="https://www.guildmortgage.com/" target="_blank"><img src="https://www.guildmortgage.com/wp-content/uploads/2016/11/Guild_Logo_RGB_Full.png" width="25%"></a></p>

# Developer test for Guild / Laravel

## Given

- You have a loan application
  - The loan application has 2 borrowers
    - One borrower has a job
    - The other borrower has a job and a bank account

## Requirements

- Fork this git repository and create a feature branch for your changes
- Install a fresh copy of Laravel
- Create some simple database tables to represent the above scenario
  - By simple I mean just the basics of what's really needed for this exercise
  - For example, the borrower should have a name, but we don't need date of birth, social security number or contact information for this exercise
  - Though I would like to see the standard date fields as part of the design (ie. created, updated, deleted)
- Write a query (or queries) that shows the total annual income and bank account values for the application
- Expose an API end point to show the results of the query (or queries)
  - All output should be in JSON format
- Write a unit test on at least one method in the project
  - I'm deliberatly keeping this requirement vague to give you freedom to decide what to test and how
- Update this README file with any installation instructions needed so we can clone and run your code
- Create a Github Pull Request against this repo with your changes

## What we're looking for

- Your general skill-set with PHP and MySQL
- Your general architecture skills
- How well you know your way around Laravel
- Your ability to write unit tests
- Coding style
- How well you adhere to the PSR standards
- Usage of design patterns in your code

## Installation instructions

## Prerequisites

Before getting started with the project, make sure you have the following software installed:

- PHP (7.4 or later)
- Composer
- MySQL

1. Clone the repository

2. Navigate to the project directory

3. Install the dependencies using Composer:

```shell
composer install
```

4. Create a copy of the `.env.example` file and rename it to `.env`.

```shell
cp .env.example .env
```

5. Generate application key

```shell
php artisan key:generate
```

6. Intall mysql if not already installed

```shell
  brew install mysql
```

7. Start the sever

```shell
  brew services start mysql
```

8. Configure the database connection in the `.env` file with your database credentials.

9. Run the database migrations:

```shell
php artisan migrate
```

10. (Optional) Seed the database with sample data:

```shell
php artisan db:seed
```

## Usage

To run the Laravel development server, execute the following command:

```shell
php artisan serve
```

The server will start running at `http://localhost:8000`.

### API Endpoints

The following API endpoints are available: You can run them in the browser.  
for example `http://localhost:8000/api/loan-applications/1/totals`

- `GET /api/loan-applications/{id}/totals`: Retrieves the total annual income and total bank account value for a specific loan application ID.

- `GET /api/loan-applications/{id}/annual-income`: Retrieves the total annual income for a specific loan application ID.

- `GET /api/loan-applications/{id}/bank-account-value`: Retrieves the total bank account value for a specific loan application ID.

- `POST /api/loan-applications/add`: Add a new loan application

### Run curl to test the post request to add a loan application

```
curl -X POST -H "Content-Type: application/json" -d '{
"loan": {
"loan_amount": 10000
},
"borrowers": [
{
"first_name": "Jason",
"last_name": "Williams",
"annual_salary": 50000,
"total_bank_balance": 10000
},
{
"first_name": "Donna",
"last_name": "Smith",
"annual_salary": 60000,
"total_bank_balance": 15000
}
]
}' http://localhost:8000/api/loan-applications/add
```

### Running Tests

To execute the tests for the project, run the following command:

```shell
php artisan test
```

The tests will run and display the results in your console.
