# SIGIE
Sistema de Informações para Gestão de Instituição de Ensino

![Apresentação do projeto](doc/apresentacao.gif)

## Modelo de Entidades e Relacionamentos (MER)
![Apresentação do projeto](doc/MER.png)

## Ferramentas Utilizadas
- Template: [SB Admin 2](https://github.com/BlackrockDigital/startbootstrap-sb-admin-2)
- Jquery 3.2
- Inputmask 4.0.8
- PHP 7.3
- MYSQL 5.7
- Laravel 6.0
- Composer 1.8.6
- NPM 6.4.1
- Docker

## Requisitos
- Docker

## Instalação/Configuração
 Configuração de variaveis de ambiente, crie o arquivo `.env` com os dados de conexão, como mostra o exemplo:
````ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:F9M2P/F29K758VdvS7+5XqrBHe3mRreCFWX7a2EE1FM=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
# Se rodar aplicação pelo docker utilize essa conexao
DB_HOST=sigie-mysql
DB_PORT=3306
DB_DATABASE=sigie
DB_USERNAME=root
DB_PASSWORD=secret
# Ou Se rodar a aplicação em sua maquina utilize essa configuração
#DB_HOST=localhost
#DB_PORT=3308
#DB_DATABASE=sigie
#DB_USERNAME=root
#DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


````

### Docker 

- Monta os containers do docker:
    ````
    docker-compose up --build
    ````
- Aperte `CTRL + C` Suba os containers em background:
    ````
    docker-compose start
    ````
- Instalação dos pacotes COMPOSER:
    ````
    docker-compose exec app php composer.phar install
    ````
- Subindo banco de dados junto com os dados fake
    `````
    docker-compose exec app php artisan migrate:fresh --seed
    ````

### Docker portas para acesso externo
- Mysql: `localhost:3308`
- Projeto PHP: `localhost:8083`