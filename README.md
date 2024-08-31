# Documentação do Sistema

## Índice
1. [Introdução](#introdução)
2. [Tecnologias Utilizadas](#tecnologias-utilizadas)
3. [Requisitos de Instalação](#requisitos-de-instalação)
4. [Configuração do Ambiente de Desenvolvimento](#configuração-do-ambiente-de-desenvolvimento)
5. [Estrutura do Projeto](#estrutura-do-projeto)
6. [Configuração do Banco de Dados](#configuração-do-banco-de-dados)
7. [Rotas e Endpoints da API](#rotas-e-endpoints-da-api)
8. [Autenticação](#autenticação)
9. [Gerenciamento de Erros](#gerenciamento-de-erros)
10. [Testes](#testes)
11. [Deploy](#deploy)
12. [Anexos e Recursos](#anexos-e-recursos)

## 1. Introdução
Este documento fornece uma visão geral do sistema, abordando suas funcionalidades principais, a arquitetura utilizada, e como configurar, desenvolver e manter o projeto. O sistema foi desenvolvido utilizando o framework Laravel e destina-se à criação de planos de férias, onde o usuário poderá organizar suas férias com a localização do destino, a data da viagem e, se for necessário, informar se haverá alguma companhia durante as viagens.

## 2. Tecnologias Utilizadas
- **Backend**: PHP 8.x, Laravel 9.x
- **Banco de Dados**: MySQL 8.x
- **Outras Bibliotecas**: Laravel Passport para autenticação, DomPDF para geração de PDFs
- **Servidor Web**: Apache (XAMPP)
- **Ferramentas**: Composer, Git, Postman (para testes de API)

## 3. Requisitos de Instalação

### Software Necessário
- **PHP**: Versão 8.x ou superior
- **Composer**: Para gerenciar as dependências do PHP
- **MySQL**: Versão 8.x
- **Git**: Para controle de versão
- **Servidor Web**: Apache (via XAMPP ou WAMP)

### Dependências
- **Laravel Framework**
- **Laravel Passport**
- **DomPDF**

## 4. Configuração do Ambiente de Desenvolvimento

### Clonar o Repositório
$ git clone https://github.com/raborzoni/vacationPlan.git
$ cd vacationPlan

### Instalar Dependências do Projeto
$ composer install

### Configurar o Arquivo .env
Configure as variáveis de ambiente, como:
- `DB_CONNECTION`
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`
- `APP_KEY`, entre outras.

### Gerar a Chave da Aplicação
$ php artisan key:generate

### Configurar o Banco de Dados
Crie o banco de dados conforme definido no arquivo .env.
Execute as migrações para criar as tabelas necessárias:
$ php artisan migrate

### Rodar o Servidor de Desenvolvimento
$ php artisan serve

Acesse o sistema em `http://localhost:8000`.

## 5. Estrutura do Projeto

### Diretórios Importantes
- `app/`: Contém os controladores, modelos e outras classes centrais do Laravel.
- `config/`: Arquivos de configuração da aplicação.
- `database/migrations/`: Arquivos de migração para a estrutura do banco de dados.
- `routes/`: Definição das rotas da aplicação.
- `resources/views/`: Template de PDF.

### Arquivos Principais
- `app/Models/`: Contém os modelos Eloquent para interação com o banco de dados.
- `app/Http/Controllers/`: Contém os controladores que processam as requisições HTTP.
- `routes/api.php`: Define as rotas da API.

## 6. Configuração do Banco de Dados

### Conexão
No arquivo `.env`, defina as configurações do banco de dados:
- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=nome_do_banco`
- `DB_USERNAME=root`
- `DB_PASSWORD=sua_senha`

### Migrações e Seeds
- **Migrações**: Utilize `php artisan migrate` para criar as tabelas.

## 7. Rotas e Endpoints da API

### Rotas Públicas
- **POST** `/api/register`: Registro de usuários.
  - **Parâmetros**: `name`, `email`, `password`, `password_confirmation`.
- **POST** `/api/login`: Autenticação de usuários.
  - **Parâmetros**: `email`, `password`.

### Rotas Protegidas
- **POST** `/api/logout`: Logout de usuários.
- **POST** `/api/holidays`: Criar um novo plano de férias.
- **GET** `/api/holidays`: Recuperar todos os planos de férias.
- **GET** `/api/holidays/{id}`: Recuperar um plano de férias específico.
- **PUT** `/api/holidays/{id}`: Atualizar um plano de férias.
- **DELETE** `/api/holidays/{id}`: Excluir um plano de férias.
- **PDF** `/api/holidays/{id}/pdf`: Download do PDF de um plano de férias específico.

## 8. Autenticação

### Laravel Passport
O sistema utiliza Laravel Passport para autenticação via OAuth2. Siga os passos abaixo para instalar e configurar o Passport:

1. Instalar o Passport
$ composer require laravel/passport

2. Rodar as Migrações
$ php artisan migrate

3. Instalar o Passport
$ php artisan passport:install

4. Configurar o Passport no AuthServiceProvider:
   - Adicione `Passport::routes();` ao método `boot()` em `app/Providers/AuthServiceProvider.php`.

### Proteção das Rotas
Rotas que exigem autenticação utilizam o middleware `auth:api`.

## 9. Gerenciamento de Erros

### Tratamento de Erros
- Erros são capturados e tratados no arquivo `app/Exceptions/Handler.php`.
- Respostas de erro são padronizadas no formato JSON.

### Mensagens de Erro Comuns
- **401 Unauthorized**: Quando a autenticação falha.
- **404 Not Found**: Quando uma rota ou recurso não é encontrado.

## 10. Testes

### Testes Unitários
- Os testes unitários estão localizados no diretório `tests/Unit`.
- Para rodar os testes, utilize o comando correspondente no Laravel.

### Testes de Integração
- Os testes de integração estão localizados no diretório `tests/Feature`.
- Cobrem cenários de ponta a ponta, como autenticação e operações CRUD.

## 11. Deploy

### Pré-Requisitos para Deploy
- Certifique-se de que todas as dependências estão instaladas.
- Execute as migrações.
- Configure corretamente o arquivo `.env` em produção.

### Serviços de Hospedagem
- DigitalOcean

### Atualizações de Dependências
- Utilize o comando apropriado para manter as dependências atualizadas.

## 12. Anexos e Recursos
- **Documentação do Laravel**: [Laravel Docs](https://laravel.com/docs)
- **Documentação do Passport**: [Passport Docs](https://laravel.com/docs/9.x/passport)
- **Guia de Estilo de Código**: Utilize [PSR-12](https://www.php-fig.org/psr/psr-12/) para padronizar o estilo de código.
