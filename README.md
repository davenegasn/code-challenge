# Temper.works backend coding challenge

### Assumptions
My first assumption was that since the instructions stated no frameworks, keep it simple, and do it in less than 1 hour, it wouldn't make much sense to create any frontend app. 

My second assumption was that since the instructions mention a "program that should run and see if requirements are implemented", and also the fact that phpunit was included as a dependency, the center of the challenge was to create code and to prove that the code works.

### Explanation 

I created a parking class ready to use and to be called. It contains different methods that provide checks, sets and gets to handle the basics of a parking operations. Then I created unit tests with 6 possible scenarios: 

✔ A parking has ten spots
✔ A car can park when there is a free spot
✔ A car can leave the parking
✔ When the parking is full and car leaves a new car can park
✔ A parking (number) spot is valid
✔ A parking (number) spot is not valid

- For running the app I used the suggested 
`docker compose up -d`
- And for running the tests 
`docker compose exec app vendor/bin/phpunit --testdox --colors tests/ParkingTest.php`
I included --testdox --colors for the tests to show more descriptive in the console
