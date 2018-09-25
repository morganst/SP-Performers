<b>Instructions to setup</b> :fire::fire::pow:

install composer/laravel/node if you haven't already

pull this code into your local machine

go to your db admin page and create new db, I named mine "SP-Performers"

go to your .env file and make sure everything matches with your db 

php artisan migrate

php artisan db:seed --class=StudentsTableSeeder

^^ this will put 50 student records into your db

run <i>npm install</i> and <i>npm run dev</i>

I do <i>npm run watch</i> on one terminal and <i>php larvel serve</i> on another for the best dev enviroment 

the views are in react in resources/js file

Good luck!
