# Sistema de Gestão de Cinemas e Filmes

Este projeto se trata de um sistema para controle de cinemas e filmes, com funcionalidades de gestão de tickets e visualização de filmes disponíveis. Suportando multi-tenancy,
proporcionará uma experiência aprimorada tanto para administradores de cinema quanto para
os clientes, oferecendo um painel administrativo central eficiente e uma gestão de assentos
simplificada.

## Tecnologias utilizadas

* Backend: Laravel
* Frontend: Blade e Vue
* Banco de dados: PostgreSQL
## Instalação e Documentação

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

 ### Observações

 1. Neste projeto resolvi não utilizar Docker devido à alguns conflitos encontrados com o pacote multitenancy do laravel, mas é uma alternativa também para rodar em diversos ambientes.  
 2. Utilizei o PostgreSQL instalado já em minha máquina na versão 16, o PHP na versão 8 e o Laravel na versão 10.
 3. Para permissão dos usuários foi feita direto no painel as 3 opções de cargos: super_admin, admin(tenant) e usuários(clientes) mas há a alternativa também para utilizar o pacote do [Laravel-permission](https://spatie.be/index.php/docs/laravel-permission/v6/introduction) do Spatie.
 4. Para autenticação do usuário pode ser utilzizado o scaffolding do Laravel Breeze.
