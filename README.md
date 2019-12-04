# shoutingQuote

to run this you need to execute few commands in cli

composer install

php bin/console server:run

and then you can run command like curl -s http://localhost:8000/shout/steve-jobs?limit=4 to test API

to run tests, just execute `phpunit.xml.dist` file with phpunit
