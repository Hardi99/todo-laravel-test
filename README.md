# 📝 Gestion de Tâches - Test Technique Laravel

Application minimaliste de gestion de tâches développée en **PHP 8.1+** avec une architecture **Laravel-style**.

## 🚀 Installation Rapide

```bash
# Naviguer dans le dossier
cd todo-app

# Installer les dépendances (juste l'autoload)
composer install

# Initialiser la base de données
php database/migrate.php

# Lancer le serveur
php -S localhost:8000 -t public
```

Accéder à : **http://localhost:8000**

## ✨ Fonctionnalités

- ✅ Lister les tâches (avec statut, dates)
- ✅ Ajouter une nouvelle tâche
- ✅ Marquer une tâche comme "terminée"
- ✅ Supprimer une tâche
- ✅ Interface responsive Bootstrap 5
- ✅ Base de données SQLite

## 🛠️ Stack Technique

| Composant | Technologie |
|-----------|-------------|
| **Langage** | PHP 8.1+ (Enum, Match, Readonly) |
| **Architecture** | MVC Laravel-style |
| **Base de données** | SQLite + PDO |
| **Frontend** | Bootstrap 5 + PHP natif |
| **Routing** | Pattern matching moderne |
| **ORM** | Active Record minimal |

## 📁 Structure

```
todo-app/
├── public/
│   ├── index.php         # Entry point + Router
│   └── .htaccess         # URL rewriting
├── app/
│   ├── Enums/
│   │   └── TaskStatus.php    # Enum PHP 8.1 (à faire, en cours, terminée)
│   ├── Models/
│   │   └── Task.php          # Active Record pattern
│   └── Controllers/
│       └── TaskController.php # CRUD logic
├── views/
│   └── tasks.php         # Vue unique Bootstrap
├── database/
│   ├── database.sqlite   # SQLite DB
│   ├── init.sql          # Schema SQL
│   └── migrate.php       # Migration script
├── composer.json         # Autoload PSR-4
└── README.md
```

## 🎯 Choix Techniques

### Pourquoi cette approche ?

**Modernité** :
- Enum PHP 8.1+ (type-safe pour les statuts)
- Match expression au lieu de switch
- Typed properties partout
- Arrow functions pour le mapping

**Efficacité** :
- 0 dépendances externes (sauf autoload)
- Routing ultra-rapide via pattern matching
- SQLite = 0 configuration serveur
- Active Record minimal (pas de couche ORM lourde)

**Simplicité** :
- 1 seule vue (tasks.php)
- 1 seul controller
- 1 seul model
- ~300 lignes de code total

### Améliorations possibles (avec plus de temps)

**Court terme** :
- Validation côté serveur (titre obligatoire, longueur max)
- Édition des tâches existantes
- Filtres par statut (tabs Bootstrap)
- Messages flash de confirmation

**Moyen terme** :
- Vrai framework Laravel complet
- API REST pour SPA/mobile
- Authentification utilisateur
- Tests PHPUnit

**Long terme** :
- Docker + Docker Compose
- CI/CD GitHub Actions
- Deploy Heroku/Vercel
- Dates d'échéance + rappels

## 🧪 Tests Manuels

```bash
# Tester l'autoload
composer dump-autoload -o

# Vérifier la BDD
php -r "var_dump((new PDO('sqlite:database/database.sqlite'))->query('SELECT * FROM tasks')->fetchAll());"

# Lancer les tests
php -S localhost:8000 -t public
# Ouvrir http://localhost:8000
# Ajouter une tâche
# La marquer comme terminée
# La supprimer
```

## 📊 Statistiques

- **Lignes de code** : ~300
- **Fichiers PHP** : 6
- **Dépendances** : 0
- **Temps de développement** : < 2h
- **Compatible** : PHP 8.1+

## 👤 Auteur

Test technique réalisé le 24/12/2025

---

**Note** : Ce projet privilégie la **simplicité et l'efficacité** plutôt que la sur-engineering. C'est une preuve de concept démontrant la maîtrise de PHP moderne et des patterns MVC.
