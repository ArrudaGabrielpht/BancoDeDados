# AULA 08

Para contagem de linhas de uma tabela:

```sql
SELECT COUNT(*) FROM produtos;
```

Para realizar contagem e renomear a tabela:

```sql
SELECT COUNT(*) AS total_registros FROM produtos;
```

Para aplicar filtros nas consultas:

```sql
SELECT COUNT(*) AS produtos_baixo_estoque FROM produtos
WHERE estoque < 10;
```

Para exibir o maior valor:

```sql
SELECT MAX(preco) AS maior_preco FROM produtos;
```

Caso você queira saber qual o nome do produto mais caro:

```sql
SELECT nome, preco FROM produtos ORDER BY preco DESC;
```

Para exibir o produto mais barato:

```sql
SELECT MIN(preco) AS menor_valor FROM produtos;
```

Para obter a média de uma coluna:

```sql
SELECT AVG(preco) AS media_precos FROM produtos;
```

Para limitar casas decimais:

```sql
SELECT ROUND(AVG(preco), 2) AS media_precos FROM produtos;
```

Consulta geral:

```sql
SELECT MAX(preco) AS maior_preco, MIN(preco) AS menor_preco, ROUND(AVG(preco), 2) AS media FROM produtos;
```

Para consultar tudo o que me interessa:

```sql
SELECT MAX(preco) AS maior_preco, MIN(preco) AS menor_preco, ROUND(AVG(preco), 2) AS media, SUM(estoque) AS total_produtos FROM produtos;
```

Para somar o total de faturamento vendendo todos os produtos da loja:

```sql
SELECT SUM(preco * estoque) AS total_faturamento FROM produtos;
```

