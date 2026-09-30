# API de Almoxarifado

API feita em PHP e PostgreSQL para cadastrar e controlar peças de um almoxarifado.

## Tecnologias

- PHP
- PostgreSQL
- PDO
- Thunder Client

## Estrutura

```text
almoxarifado/
├── api.php
├── banco.sql
└── conexao.php
```

## Banco de dados

### Criando o banco

```sql
CREATE DATABASE almoxarifado;
```

Depois de criar o banco, foi criada a tabela `pecas`:

```sql
CREATE TABLE pecas (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(20) NOT NULL,
    fornecedor VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);
```

## Conexão com o banco

Arquivo `conexao.php`:

```php
<?php

$host = "localhost";
$dbname = "almoxarifado";
$user = "postgres";
$password = "SUA_SENHA";

try {
    $pdo = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo json_encode([
        "erro" => "Erro na conexão com o banco"
    ]);
}
```

## API

Arquivo `api.php`.

A API utiliza os métodos:

- POST
- GET
- PUT
- DELETE

### POST

Cadastra uma peça.

```text
POST /api.php
```

Exemplo:

```json
{
    "nome": "Memória RAM 8GB DDR4",
    "categoria": "eletrica",
    "fornecedor": "Kingston",
    "quantidade": 15,
    "preco_unitario": 129.90
}
```

### GET

Lista as peças cadastradas.

```text
GET /api.php
```

### PUT

Atualiza uma peça pelo ID.

```text
PUT /api.php?id=1
```

### DELETE

Exclui uma peça pelo ID.

```text
DELETE /api.php?id=1
```

## Validações

- Todos os campos obrigatórios devem ser preenchidos.
- As categorias permitidas são `eletrica`, `mecanica` e `hidraulica`.
- A quantidade não pode ser negativa.
- O preço deve ser maior que zero.

## Como executar

Na pasta do projeto, execute:

```bash
php -S localhost:8000
```

API:

```text
http://localhost:8000/api.php
```

## Testes

Os testes foram realizados utilizando o Thunder Client.

### POST - Cadastro

![alt text](<Captura de tela 2026-09-30 104845.png>)

### GET - Listagem

![alt text](<Captura de tela 2026-09-30 111857.png>)

### PUT - Atualização

![alt text](<Captura de tela 2026-09-30 111048.png>)

### DELETE - Exclusão

![alt text](<Captura de tela 2026-09-30 111843.png>)

## Consultas SQL

### Total de unidades

```sql
SELECT SUM(quantidade) AS total_unidades
FROM pecas;
```

### Valor total do estoque

```sql
SELECT SUM(quantidade * preco) AS valor_total_estoque
FROM pecas;
```

### Maior preço

```sql
SELECT MAX(preco) AS maior_preco
FROM pecas;
```

### Menor preço

```sql
SELECT MIN(preco) AS menor_preco
FROM pecas;
```

### Preço médio

```sql
SELECT ROUND(AVG(preco), 2) AS preco_medio
FROM pecas;
```

### Valor do estoque de peças elétricas

```sql
SELECT SUM(quantidade * preco) AS total_eletrica
FROM pecas
WHERE categoria = 'eletrica';
```