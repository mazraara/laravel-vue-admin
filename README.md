INSTRUCTIONS 

 1) To setup the local env i used Docker. you can run the below commands to setup
    
    `docker-compose build`

    `docker-compose up -d`

2) To setup the project
    
        Copy .env.example file to .env and edit database credentials
	
	Run composer install
	
	Run php artisan key:generate
	
	Run php artisan migrate
	
	php artisan db:seed
	
	php artisan passport:install
	
	npm install
	
	npm run dev
	
	Now application should be available under -> http://localhost:8080
	
	To login -> please use the register form

3) API endpoints

	http://localhost:8080/api/v1/category

	http://localhost:8080/api/v1/product
