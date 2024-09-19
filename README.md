# Agenda de Contatos

Este projeto é uma aplicação de agenda de contatos simples utilizando Laravel para o backend e Vue.js para o frontend. O objetivo é fornecer uma interface para adicionar, listar, editar e excluir contatos.

## Requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e npm (ou yarn)
- MySQL ou outro banco de dados suportado pelo Laravel

## Configuração do Projeto

Siga as etapas abaixo para configurar e executar o projeto localmente.

### 1. Clonar o Repositório

Clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/SEU_USUARIO/contactbook.git
cd contactbook
```

### 2.Instalar dependências do backend

Instale as dependências do Laravel utilizando Composer:

```bash
composer install
```

### 3. Configurar o ambiente

Copie o arquivo .env.example para .env e configure as variáveis de ambiente, como a conexão com o banco de dados:

```bash
cp .env.example .env
```

Edite o arquivo .env com suas configurações de banco de dados

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 4. Executar migrations

```
php artisan migrate
```

### 5. Instalar dependências do frontend

```bash
npm install
# ou
yarn install
```

### 6. Compilar Assets do frontend

```bash
npm run dev
# ou
yarn dev
```

### 7. Executar o servidor
```
php artisan serve
```

### Rotas

Lista de Contatos: GET /contacts - Exibe a lista de contatos.
Formulário de Criação de Contato: GET /contacts/create - Exibe o formulário para adicionar um novo contato.
Salvar Novo Contato: POST /contacts - Envia o formulário para criar um novo contato.
Editar Contato: GET /contacts/{id}/edit - Exibe o formulário para editar um contato existente.
Atualizar Contato: PUT /contacts/{id} - Envia o formulário para atualizar um contato existente.
Excluir Contato: DELETE /contacts/{id} - Remove um contato existente.