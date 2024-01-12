# API - Academia SysTrain
O Projeto Academia SysTrain consiste em uma API para gestão de alunos de uma academia, que permite o cadastro de usuários do sistema, alunos, treinos e exercicio, no projeto também é possivel enviar email de boas vindas para os novos usuários e gerar PDF de treinos da semana dos alunos.

## 🔧 Tecnologias utilizadas

Projeto foi desenvolvido utilizando a linguagem PHP com framework Laravel. O banco de dados foi hospedado através do Docker utilizando PostgreSQL com DBeaver. 

### Vídeo de apresentação: 
(https://drive.google.com/drive/folders/1Sf6MqVekAAVpdbJFeABDflO6NM8Ajzmg?usp=drive_link)

Seguem abaixo as depêndencias externas utilizadas:
| Plugin | Uso |
| ------ | ------ |
| DOMPDF | Dompdf é um conversor de HTML para PDF, utilizado para gerar pdf dos treinos dos alunos |

### Modelagem da base de dados PostgreSQL

Modelo extraido do app DBeaver.

![modelagem de dados api](https://github.com/diegobmorais/Projeto-M2-PHP/assets/128264029/b8ec5faf-cec3-4de5-8703-7f863bddfa69)


## 🚀 Como executar o projeto

-Clonar o repositório https://github.com/diegobmorais/Projeto-M2-PHP

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

