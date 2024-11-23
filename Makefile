REPO_NAME=calculator

all: build start test stop

build:
	docker build --build-arg REPO_NAME=${REPO_NAME} -t ${REPO_NAME} .
start:
	docker run --rm --name ${REPO_NAME} \
	-v ${PWD}/src:/${REPO_NAME}/src \
	-v ${PWD}/tests:/${REPO_NAME}/tests -d \
	-t ${REPO_NAME}
stop:
	docker stop ${REPO_NAME}
shell:
	docker exec -ti ${REPO_NAME} bash
logs:
	docker logs --follow -t ${REPO_NAME}
publish:
	docker cp ${REPO_NAME}:/${REPO_NAME}/vendor ./
	docker cp ${REPO_NAME}:/${REPO_NAME}/composer.json ./composer.json
	docker cp ${REPO_NAME}:/${REPO_NAME}/composer.lock ./composer.lock
	docker cp ${REPO_NAME}:/${REPO_NAME}/symfony.lock ./symfony.lock
	docker cp ${REPO_NAME}:/${REPO_NAME}/phpunit.xml ./phpunit.xml

test:
	docker cp ./phpunit.xml ${REPO_NAME}:/${REPO_NAME}/phpunit.xml
	docker exec -it ${REPO_NAME} bin/phpunit
