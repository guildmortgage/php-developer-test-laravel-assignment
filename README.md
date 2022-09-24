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

> To run this project, you must have PHP 7 installed as a prerequisite.

Begin by cloning this repository to your machine, and installing all Composer & NPM dependencies.

```bash
git clone git@github.com:aceraven777/laracasts-forum-laravel-tdd.git
cd council && composer install && npm install
php artisan council:install
npm run dev
```

### Step 2

Until an administration portal is available, manually insert any number of "channels" (think of these as forum categories) into the "channels" table in your database.

1. Visit: http://council.test/register and register an account.
1. Edit `config/council.php`, adding the email address of the account you just created.
1. Visit: http://council.test/admin/channels and add at least one channel.
