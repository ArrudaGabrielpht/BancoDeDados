## Aula 02
Comando para para apagar banco de dados 

```sql
DROP DATABASE lojamax;
```
Comando para criar um banco de dados

```sql
CREATE DATABASE loja/
```
O objetivo é criar uma loja para aprender os principais comandos SQl

Primary Key (PK)

```mermaid
erDiagram
  PRODUTOS{
    int id PK "Gerado automaticamente"
    varchar nome "Mome do produto"
    numeric nome "Preços em reais"
    int estoque "Unidades disponiveis"
  }
  ```
  ---
  Para criar a tabela, ultilizamos os comandos abaixo:

  ```sql
  CREATE TABLE produtos(
id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
preco NUMERIC(10,2) NOT NULL,
estoque INT NOT NULL DEFAULT 0
);
```
--Inserindo valores:

```sql
INSERT INTO produtos(nome,preco,estoque)
VALUES('iphone 17','10000.00','15');
```
