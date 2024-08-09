set up:
	@make up
	@make install
	@make migrate

up:
	docker-compose up -d

down:
	docker-compose down

build:	
	docker-compose build

install:
	docker exec apitorneofuchibol bash -c "composer install"

migrate:
	docker exec apitorneofuchibol bash -c "php artisan migrate"

data:
	docker exec apitorneofuchibol bash -c "composer --version"


