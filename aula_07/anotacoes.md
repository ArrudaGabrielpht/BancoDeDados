## Analise de dados

Para verificar a quantidade de linhas e renomear a tabela:
```sql
SELECT COUNT (8) AS total_de_produtos FROM produtos;
```
---
Para renomear a linha e verifcar quantos produtos tem em estoque:
```sql
SELECT COUNT (*) AS total_de_produtos FROM produtos WHERE estoque < 10;
```
---
Para filtrar e renomear a table de produto mais caro e mais barato:
```sql
SELECT MAX(preco) AS produto_mais_caro,
       MIN(preco) AS produto_mais_barato
FROM produtos;
```
---
Para ver a média de preços:
```sql
SELECT AVG(preco) FROM produtos;
```
---
Para arredondar e renomear a me´dia dos preços:
```sql
SELECT ROUND(AVG(preco),2) AS preco_medio FROM produtos;
```
---
Para somar o total de produtos:
```sql
SELECT SUM(estoque) AS total_de_produtos FROM produtos;
```
---
Criando uma tabela com os dados acima:
```sql
SELECT COUNT(*) AS total_de_produtos,
       MIN(preco) AS menor_valor,
       MAX(preco) AS maior_valor,
       ROUND(AVG(preco),2) AS media_valores,
       SUM(estoque) AS total_pecas
FROM produtos;
```
![alt text](image.png)
---
Para ver o estoque/faturamento por cada produto:
```sql
SELECT nome,preco,estoque,
preco * estoque AS total_estoque FROM produtos ORDER BY total_estoque DESC;
```
---
Para ver o faturamento total:
```sql
SELECT
SUM(preco*estoque)
AS patrimonio_total
FROM produtos;
```
---
 

