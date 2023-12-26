# CONTRAT D'INTERFACE d'API

# Remarque

Le format de reponse des requêtes en `GET`, `POST`, `PUT` et `DELETE` sera comme suit :

```json
{
  "ressource": {
    // ... les données de la ressource demandée
  }
}
```

**NB**: En cas d'erreur un code `500` est retrourné (code d'erreur de la requête). 

L'API a ete deployee sur serveur et est disponible au requete via l'url suivante : "http://stock.mdld0699.odns.fr/"
# Authentification 

## 1. Connexion

- **Endpoint**: `api/login `
- **Méthode HTTP**: `POST`

### Exemple de requête

- **Uri** : `api/login `
- **Request-body** : 

```json 
{
  "login": "benalicherif.yd@gmail.com",
  "password": "password",
}
```

### Exemple de réponse

```json 
{
  "user" : {
    // ... les données de l'utilisateur
  },
  "token": "eylkzheizomecnzioeh....",
}
```

## 2. Déconnexion

- **Endpoint**: `api/logout `
- **Méthode HTTP**: `POST`

### Exemple de requête

- **Uri** : `api/logout `
- **Request-body** : passer le token de connexion


# Catégorie 

## 1. Liste des catégories

- **Endpoint**: `api/categories`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/categories`
- **Request-body** : aucun paramètre

## 2. Création d'une catégorie

- **Endpoint**: `api/categories`
- **Méthode HTTP**: `POST`

### Exemple de requête

- **Uri** : `api/categories`
- **Request-body** : aucun paramètre

```json
{
  "libelle": "Vêtement Homme"
}
```

## 3. Récupération d'une catégorie

- **Endpoint**: `api/categories/:id`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/categories/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "id": 1,
  "categorie": "Vêtement Homme",
  "created_at": 2023-12-26 14:30:00,
  "updated_at": 2023-12-26 14:30:00
}
```

## 4. Modification d'une catégorie

- **Endpoint**: `api/categories/:id`
- **Méthode HTTP**: `PUT`

### Exemple de requête

- **Uri** : `api/categories/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "categorie": ,
}
```

## 5. Suppression d'une catégorie

- **Endpoint**: `api/categories/:id`
- **Méthode HTTP**: `DELETE`

### Exemple de requête

- **Uri** : `api/categories/1`
- **Request-body** 

```json
{
  "id": 1
}
```

# Opération 

## 1. Liste des Opérations

- **Endpoint**: `api/operations`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/operations`
- **Request-body** : aucun paramètre

## 2. Création d'une Opération

- **Endpoint**: `api/operations`
- **Méthode HTTP**: `POST`

### Exemple de requête

- **Uri** : `api/operations`
- **Request-body** : aucun paramètre

```json
{
  "libelle": "Commandes"
}
```

## 3. Récupération d'une Opération

- **Endpoint**: `api/operations/:id`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/operations/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "id": 1,
  "categorie": "Commandes",
  "created_at": 2023-12-26 14:30:00,
  "updated_at": 2023-12-26 14:30:00
}
```

## 4. Modification d'une Opération

- **Endpoint**: `api/operations/:id`
- **Méthode HTTP**: `PUT`

### Exemple de requête

- **Uri** : `api/operations/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "categorie": ,
}
```

## 5. Suppression d'une Opération

- **Endpoint**: `api/operations/:id`
- **Méthode HTTP**: `DELETE`

### Exemple de requête

- **Uri** : `api/operations/1`
- **Request-body** 

```json
{
  "id": 1
}
```

# Fournisseur 

## 1. Liste des Fournisseurs

- **Endpoint**: `api/providers`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/providers`
- **Request-body** : aucun paramètre

## 2. Création d'un Fournisseur

- **Endpoint**: `api/providers`
- **Méthode HTTP**: `POST`

### Exemple de requête

- **Uri** : `api/providers`
- **Request-body** : aucun paramètre

```json
{
  "libelle": "Vêtement Homme"
}
```

## 3. Récupération d'un Fournisseur

- **Endpoint**: `api/providers/:id`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/providers/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "id": 1,
  "categorie": "Vêtement Homme",
  "created_at": 2023-12-26 14:30:00,
  "updated_at": 2023-12-26 14:30:00
}
```

## 4. Modification d'un Fournisseur

- **Endpoint**: `api/providers/:id`
- **Méthode HTTP**: `PUT`

### Exemple de requête

- **Uri** : `api/providers/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "categorie": ,
}
```

## 5. Suppression d'un Fournisseur

- **Endpoint**: `api/providers/:id`
- **Méthode HTTP**: `DELETE`

### Exemple de requête

- **Uri** : `api/providers/1`
- **Request-body** 

```json
{
  "id": 1
}
```

# Ressource 

## 1. Liste des ressources

- **Endpoint**: `api/resources`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/resources`
- **Request-body** : aucun paramètre

## 2. Création d'une Ressource

- **Endpoint**: `api/resources`
- **Méthode HTTP**: `POST`

### Exemple de requête

- **Uri** : `api/resources`
- **Request-body** : aucun paramètre

```json
{
  "libelle": "Vêtement Homme"
}
```

## 3. Récupération d'une Ressource

- **Endpoint**: `api/resources/:id`
- **Méthode HTTP**: `GET`

### Exemple de requête

- **Uri** : `api/resources/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "id": 1,
  "categorie": "Vêtement Homme",
  "created_at": 2023-12-26 14:30:00,
  "updated_at": 2023-12-26 14:30:00
}
```

## 4. Modification d'une Ressource

- **Endpoint**: `api/resources/:id`
- **Méthode HTTP**: `PUT`

### Exemple de requête

- **Uri** : `api/resources/1`
- **Request-body** : aucun paramètre

### Exemple de réponse

```json
{
  "categorie": ,
}
```

## 5. Suppression d'une Ressource

- **Endpoint**: `api/resources/:id`
- **Méthode HTTP**: `DELETE`

### Exemple de requête

- **Uri** : `api/resources/1`
- **Request-body**
