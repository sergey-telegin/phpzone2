# PROJECT_NAME


1. Create New Project and 
2. Copy Skeleton's body
3. Config nginx and SQL ports in docker-compose.yml

warning!
все файлы, которые должен видеть браузер должны находиться в public, 
подключаемые файлы, должны находиться в src


## Installation

```bash
docker-compose up --build -d
```

## Usage

### Start up the project
```bash
docker-compose up -d
```

### Torn off the project
```bash
docker-compose down
```
### See docker containers logs
#### Specific container
```bash
docker-compose logs [container_name] -f
```

#### Specific all containers
```bash
docker-compose logs -f
```

## Customization
### Nginx
Configuration file location 
```
"./Docker/nginx/default.conf"
```

### PHP
DockerFile location
```
"./Docker/php/Dockerfile"
```
Customer php.ini configurations located at
```
"./Docker/php/conf/php.ini"
```