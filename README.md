<b>Instructions to setup</b> :fire::fire::boom:

install composer/laravel/node if you haven't already

pull this code into your local machine

go to your db admin page and create new db, I named mine "SP-Performers"

'composer install' 

'npm install'

'copy/cp .env.example .env'

php artisan key:generate

go to your .env file and make sure everything matches with your db 

php artisan migrate

php artisan db:seed 

^^ this will put 50 student records into your db

run <i>npm install</i> and <i>npm run dev</i>

I do <i>npm run watch</i> on one terminal and <i>php larvel serve</i> on another for the best dev enviroment 

the views are in react in resources/js file

Good luck!
