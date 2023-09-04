# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM product
```

## Récupérer le produit ayant un id donné (#2)

```sql
SELECT *
FROM product
WHERE id = 2
```

## Récupérer tous les produits avec une catégorie spécifiée (#1)

```sql
SELECT *
FROM product
WHERE categorie_id = 1
```

## Récupérer le produit ayant un tyoe spécifiée (#2)

```sql
SELECT *
FROM product
WHERE type_id = 2
```