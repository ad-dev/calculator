# Calculator

## requirements

`docker` and `make` must be installed on host machine to build and run `calculator`

```
git clone https://github.com/ad-dev/calculator.git
cd calculator
make

see details below:

## build, start, run tests and stop

```
make
```

## `make` targets

`all` - runs `build` `start` `test` and `stop` targets

`shell` enters the container (runs bash)

`build` - builds the container

`stop` - stops the container

`start` - starts the container

`publish` - copy files from docker container to host (vendor/, composer.*, symphony.lock, phpunit.xml)
