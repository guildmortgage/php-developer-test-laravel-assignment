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
### Prerequisites

* To run this project, you must have PHP 8 installed.
* You should setup a host on your web server for your local domain. 

### Step 1

> To run this project, you must have PHP 8 installed as a prerequisite.

Begin by cloning this repository to your machine, and installing all Composer dependencies.

```bash
git clone https://github.com/ladislaoRS/php-developer-test-laravel-assignment.git

> cd loan-app && composer install

> php artisan passport:install

> php artisan migrate

> php artisan db:seed

``` 

### Step 2

Serving Laravel
```bash
php artisan artisan:serve
``` 

### Step 3

Run Test Suite
```bash
php artisan artisan:test
``` 

### Step 4 - Use User Register API

Register User and get "access_token" to use API
```bash
> POST /api/register HTTP/1.1
> Host: localhost:8000
> User-Agent: insomnia/2021.7.2
> Content-Type: application/json
> Accept: application/json
> Content-Length: 81
> Authorization: Bearer XXXXX
``` 

Payload Example:
```json
{
  "name": "Ladislao",
  "email": "ladislao@email.com",
  "password": "s3cretpwd"
}
``` 

### Step 5 - Use Borrower API

Create Borrower

```bash
> POST /api/borrower HTTP/1.1
> Host: localhost:8000
> User-Agent: insomnia/2021.7.2
> Content-Type: application/json
> Accept: application/json
> Content-Length: 81
> Authorization: Bearer XXXXX
``` 

Payload Example:
```json
{
  "name": "Ladislao",
  "email": "ladislao@email.com",
}
```

Get All Borrowers

```bash
> GET /api/borrower HTTP/1.1
> Host: localhost:8000
> User-Agent: insomnia/2021.7.2
> Content-Type: application/json
> Accept: application/json
> Content-Length: 81
> Authorization: Bearer XXXXX
``` 

Response Example:
```json
{
	"data": [
		{
			"id": 1,
			"name": "Camilla Lemke",
			"email": "grant.loyal@example.com",
			"job": {
				"title": "Prof.",
				"description": "Quibusdam rerum facilis rem veniam."
			},
			"bankAccount": [],
			"created_at": "2022-09-24T16:14:02.000000Z",
			"updated_at": "2022-09-24T16:14:02.000000Z"
		},
		{
			"id": 2,
			"name": "Chauncey Wilkinson",
			"email": "collin.waelchi@example.org",
			"job": {
				"title": "Dr.",
				"description": "Omnis culpa optio aliquam aut aut."
			},
			"bankAccount": [
				{
					"account_number": "05296301",
					"type": "Checking",
					"status": "Active",
					"balance": "$8037"
				},
				{
					"account_number": "75599409180",
					"type": "Checking",
					"status": "Active",
					"balance": "$79153"
				}
			],
			"created_at": "2022-09-24T16:14:02.000000Z",
			"updated_at": "2022-09-24T16:14:02.000000Z"
		}
	]
}
```

### Step 6 - Use Total Annual Report API

GET Total Annual Income By Year

```bash
> GET /api/total-annual-income HTTP/1.1
> Host: localhost:8000
> User-Agent: insomnia/2021.7.2
> Content-Type: application/json
> Accept: application/json
> Content-Length: 81
> Authorization: Bearer XXXXX
``` 

Response Example:
```json
{
  "data": {
    "2022": {
      "total_annual_income": 122549
		},
    "2021": {
      "total_annual_income": 35234
		}
	}
}
```



