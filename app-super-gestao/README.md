# API - Projeto Super Gestão
Super Gestão é um sistema online de controle administrativo. O Projeto Super Gestão consiste em um sistema feito totalmente em laravel, para realizar cadastros, consultas e pesquisas de clientes, fornecedores e clientes. Não foi dado enfase em aspectos visuais do sistemas, o foco do projeto é aplicar todo conhecimento em rotas, middlewares, model, controllers, migrations, arquivos blade, autentificações e cadastros no banco de dados.

## 🔧 Tecnologias utilizadas

Projeto foi desenvolvido utilizando a linguagem PHP com framework Laravel. O banco de dados foi hospedado através do Docker utilizando PostgreSQL com DBeaver. 

### Vídeo de apresentação: 
[...]

Seguem abaixo as depêndencias externas utilizadas:
| Plugin | Uso |
| ------ | ------ |
| ... | ... |

### Modelagem da base de dados PostgreSQL
[....]

## 🚀 Como executar o projeto

-Clonar o repositório https://github.com/diegobmorais/Laravel.git

-Criar uma base de dados no PostgreSQL com nome **bd_super_gestao**

-Instalar Docker Desktop e executar o comando no powershell como admin

```sh
 docker run --name super_gestao -e POSTGRESQL_USERNAME=docker -e POSTGRESQL_PASSWORD=docker -e POSTGRESQL_DATABASE=bd_super_gestao -p 5432:5432 bitnami/postgresql
``` 

-Criar um arquivo .env na raiz do projeto com os seguintes parametros configurados para acessar o banco de dados:
```
DIALECT_DATABASE=''
HOST_DATABASE=''
USER_DATABASE=''
PASSWORD_DATABASE=''
PORT_DATABASE=''
PORT_API=''
NAME_DATABASE=''
```

-No prompt de comando executar :
```sh
composer install 
```
-Executar em seguida:
```sh
php artisan serve
```

