## API SnapSched -  Monólito

Desenvolvimento API  -

+ Laravel.

---

## 🔧 Stack utilizada

**Back-end:** Php 8.1.2

---

## 📚 Requisitos

**Composer,PHP**

**Composer Instalado**

---

## Clone do projeto

### Clone

```bash
git clone ...ssh

```

## 🚀 Instalação

### Composer

```bash
composer install

```

### Env

```bash
cp .env.example .env

```

### Configurando `banco de dados` da aplicação (Banco de Dados)

```bash

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nomedobanco
DB_USERNAME=usuario
DB_PASSWORD=

```

### Comandos Laravel **Necessários**

```bash
php artisan key:generate
```
```bash
php artisan jwt:secret
```
### Caso não tenha feito o dump do banco de dados... Rodar o comando abaixo:
```bash
php artisan migrate
```

### Criar tokens de Clients

```bash
php artisan passport:client

```
#### Após, verificar se o registro do cliente fornece "password", no campo: "password_client"


### Após criar os arquivos secrets, com o comando abaixo:

```
php artisan passport:keys --force
```
