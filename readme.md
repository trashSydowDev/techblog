# Leroy Merlin Techblog

## Development environment

Install [Docker](https://www.docker.com/) on your system.

* [Install instructions](https://docs.docker.com/installation/mac/) for Mac OS X
* [Install instructions](https://docs.docker.com/installation/ubuntulinux/) for Ubuntu Linux
* [Install instructions](https://docs.docker.com/installation/) for other platforms

Install [Docker Compose](http://docs.docker.com/compose/) on your system.

To start the containers

```bash
docker-compose build # only the first time
docker-compose up
```

Then you can access the containers with

```bash
docker exec -i -t techblog_web_1 bash # to access the web server container
mysql --host 127.0.0.1 -u root   # to access the database
```
