# WIKI KATA

Stack tecnologico: PHP Puro, MySQL, Nginx, Vanilla Js

## Entorno Dockerizado

**Debes tener instalado Docker y Docker Compose en tu equipo.**

- [ ] Instalar la network de los contenedores en caso de no tenerla instalada antes:

```shell
docker network create app-network
```

- [ ] Levantar los contenedores:

```shell
docker-compose -p wikipedia up -d
```

- [ ] Acceder al contenedor de PHP:

```shell
docker exec -it php-fpm bash 
```

- [ ] Después de entrar al contenedor de php-fpm, ejecutar:

```shell
make deploy
```

## Acceso al sistema

Después de desplegar el proyecto correctamente, debe acceder al siguiente enlace

[`http://localhost:8080`](http://localhost:8080)
