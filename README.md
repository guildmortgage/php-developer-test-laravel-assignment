<p align="center"><a href="https://www.guildmortgage.com/" target="_blank"><img src="https://www.guildmortgage.com/wp-content/uploads/2016/11/Guild_Logo_RGB_Full.png" width="25%"></a></p>


## Installation instructions

- Laravel v9.40.1 (used PHP 8.1.6 on Apache, minimum requirement PHP 8). Installed by portable Composer.
- Please create your own .env file or inform me if needed, skipped by .gitignore
- File compression, caching and .htaccess optimization not needed at this point.
- Adding a sample SQL database dump which can be easily imported to any MySQL installation.
- If the added SQL file is used then migrate command won't be necessary to setup DB.
- The database dump is solely for testing the code without any need for initial db entries.
- The database name that is used in the dump data is 'Guildtest' so it is recommended to use in a db that does not already have a db with the same name.
- Laravel is platform independent so the code is expected to work on any platform that's running PHP

## Notes from developer

- As it is specified that this test will evaluate general skill-set with PHP and MySQL I tried to use some core PHP where Laravel could be used.
- In order to keep the setup slim and trimmed I tried to use a single controller for multiple tables.
- There are many things that could be added into this test but I had to bear in mind that 48 hours is the turnaround time for this test.
  - Spent very limited time on frontend
  - Used JavaScript only on a single form to save time
  - Used some primitive styling codes instead of CSS just to save time
  - Kept a minimalistic approach
  - Used Laravel's default date time field
  - Some form validations done some not to save time
- Code could be more robust and focused if more specs were given and less assumptions needed
- As Laravel is used instead of core PHP, very limited scope is there to follow any additional design pattern.
- DB table Databaseitems is created to hold an entry for deleted entries but did not create any visual interface as the purpose isn't very clear.
- Null values are handled by the blade templates so they will not display as blank or null.
- I have rudimentary knowledge of unit testing so I need to practice more before I could write any complex test, hence skipped the unit test part.
- Links to browse through the project:
  - anyDomain/create_borrower : to create a new borrower profile
  - anyDomain/view_borrower : List of all borrowers (web)
  - anyDomain/api/view_all : List of all borrowers (JSON)
  - anyDomain/api/view_one/<<borrower_id>> : View data of an individual borrower (JSON)
  - anyDomain/edit_borrower/<<borrower_id>> : Edit ata of individual borrower
  - anyDomain/delete_borrower/<<borrower_id>> : Delete a record and put an entry into Deleteditems table
# Database instructions and outline


<p align="center"><img src="https://raw.githubusercontent.com/workremotely/php-developer-test-laravel-assignment/feature/assumptions.png"></p>