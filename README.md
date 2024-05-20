# Sistema de Gestão de Cinemas e Filmes

Este projeto se trata de um sistema para controle de cinemas e filmes, com funcionalidades de gestão de tickets e visualização de filmes disponíveis. Suportando multi-tenancy,
proporcionará uma experiência aprimorada tanto para administradores de cinema quanto paraos clientes, oferecendo um painel administrativo central eficiente e uma gestão de assentos
simplificada.

## Tecnologias utilizadas

* Backend: Laravel
* Frontend: Blade e Vue
* Banco de dados: PostgreSQL

## Instalação e Documentação

O projeto de gerenciamento de sistemas utiliza a arquitetura MVC e Repository Pattern seguindo as PSR's do PHP.

A instalação foi feita utilizando instalador do laravel embutido com o seguinte comando:

```bash
  new laravel gerenciamento-cinemas
```
Também pode ser usado o comando padrão:
```bash
    composer create-project laravel/laravel gerenciamento-cinemas
```
Para a utilização de um sistema multi-tenancy multidatabase usei a biblioteca [Tenancy for Laravel](https://tenancyforlaravel.com/).

Após ter criado a database rodei o comando para migrar um tenant e um usuário com previlégio de super_admin:
```bash
    php artisan migrate:fresh --seed
```
Obs.: Caso a tenant já tenha sido criada na conexão será preciso apagá-la e rodar novamente o comando acima.

## Referências das tecnologias usadas

 - [Laravel](https://laravel.com/docs/10.x)
 - [Postgres](https://www.postgresql.org/)
 - [Vue](https://vuejs.org/)
 - [Swagger](https://swagger.io/)
 - [PHP](https://www.php.net/)
 - [PHPUnit](https://phpunit.de/)
 - [Tailwind](https://tailwindcss.com/)
 - [Tenancy for Laravel](https://tenancyforlaravel.com/)

