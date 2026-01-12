help:				## Show help commands
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

build:				## Build containers
	docker compose up -d --build

start:				## Run containers
	docker compose up -d

down:				## Down active containers
	docker compose down

sh:				## Exec PHP container
	docker exec -it etcd-php sh

protoc:				## Create\update services from .proto. Params {{ s=SERVICE NAME }}
	docker exec -i etcd-php sh -c "cd /var/www/src/RPC/ && protoc -I . --php_out=. --grpc_out=. --plugin=protoc-gen-grpc=`which grpc_php_plugin` Proto/$(s).proto"
