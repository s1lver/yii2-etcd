help:					## Show help commands
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

build:					## Build containers
	docker-compose -f tests/docker/docker-compose.yml up -d --build

start:					## Run containers
	docker-compose -f tests/docker/docker-compose.yml up -d

down:					## Down active containers
	docker-compose -f tests/docker/docker-compose.yml down

run-php:				## Exec PHP container
	docker exec -it etcd-php shRun