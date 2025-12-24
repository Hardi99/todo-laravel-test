# 📝 ToDo App Laravel-style

![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel--style-FF2D20?logo=laravel&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-003B57?logo=sqlite&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?logo=bootstrap&logoColor=white)

> Application minimaliste de gestion de tâches développée en **PHP 8.1+** avec une architecture **Laravel-style**. Test technique réalisé en **< 2h**.

[🚀 Demo](#installation-rapide) • [📚 Documentation](#stack-technique) • [🎯 Fonctionnalités](#-fonctionnalités)

---

## ✨ Highlights

- **120 lignes de code** PHP total (ultra-concis)
- **0 dépendance** externe (sauf Composer autoload)
- **PHP 8.1+** moderne : Enum, Match, Typed properties
- **Architecture MVC** Laravel-style
- **SQLite** zero-config
- **Bootstrap 5** responsive

## 🚀 Installation Rapide

```bash
# Cloner le projet
git clone https://github.com/Hardi99/todo-laravel-test.git
cd todo-laravel-test

# Installer (juste l'autoload)
composer install

# Initialiser la base de données
php database/migrate.php

# Lancer le serveur
php -S localhost:8000 -t public
```

**Ouvrir** : http://localhost:8000

## 🎯 Fonctionnalités

| Feature | Status |
|---------|--------|
| 📋 Lister les tâches (avec statut, dates création/modification) | ✅ |
| ➕ Ajouter une nouvelle tâche | ✅ |
| ✓ Marquer une tâche comme "terminée" | ✅ |
| 🗑️ Supprimer une tâche | ✅ |
| 📱 Interface responsive | ✅ |
| 🎨 Bootstrap 5 | ✅ |

## 🛠️ Stack Technique

| Composant | Technologie | Pourquoi |
|-----------|-------------|----------|
| **Langage** | PHP 8.1+ | Enum, Match, Typed properties |
| **Architecture** | MVC Laravel-style | Séparation des responsabilités |
| **Base de données** | SQLite + PDO | Zero-config, portable |
| **Frontend** | Bootstrap 5 | Responsive, moderne |
| **Routing** | Pattern matching | Performances, simplicité |
| **ORM** | Active Record | Eloquent-like API |

## 📁 Structure

```
todo-app/
├── public/
│   ├── index.php         # Entry point + Router (Match expression)
│   └── .htaccess         # URL rewriting
├── app/
│   ├── Enums/
│   │   └── TaskStatus.php    # Enum PHP 8.1 (à faire, en cours, terminée)
│   ├── Models/
│   │   └── Task.php          # Active Record pattern
│   └── Controllers/
│       └── TaskController.php # CRUD logic
├── views/
│   └── tasks.php         # Vue Bootstrap unique
├── database/
│   ├── database.sqlite   # SQLite DB (auto-créée)
│   ├── init.sql          # Schema SQL
│   └── migrate.php       # Migration script
├── composer.json         # Autoload PSR-4
└── README.md
```

## 💡 Choix Techniques

### 🔹 Enum TaskStatus (PHP 8.1+)

```php
enum TaskStatus: string {
    case TODO = 'à faire';
    case IN_PROGRESS = 'en cours';
    case DONE = 'terminée';
    
    public function badge(): string {
        return match($this) {
            self::TODO => 'secondary',
            self::IN_PROGRESS => 'warning',
            self::DONE => 'success',
        };
    }
}
```

**Avantages** : Type-safe, autocomplete IDE, méthodes personnalisées

### 🔹 Match Expression (Router)

```php
match(true) {
    $uri === '/' && $method === 'GET' => $controller->index(),
    $uri === '/tasks' && $method === 'POST' => $controller->store(),
    preg_match('#^/tasks/(\d+)/complete$#', $uri, $m) => $controller->complete((int)$m[1]),
    default => http_response_code(404)
};
```

**Avantages** : Concis, exhaustiveness check, return value

### 🔹 Active Record Pattern

```php
// Créer
$task = new Task(title: 'Test', status: TaskStatus::TODO);
$task->save();

// Lire
$tasks = Task::all();
$task = Task::find(1);

// Supprimer
$task->delete();
```

**Avantages** : API intuitive (Eloquent-like), pas d'ORM complexe

## 📊 Statistiques

- **Lignes de code** : ~120 PHP
- **Fichiers** : 7 fichiers PHP
- **Dépendances** : 0 (sauf autoload)
- **Temps de dev** : < 2h
- **Compatible** : PHP 8.1+

## 🧪 Tests

```bash
# Vérifier l'installation
composer dump-autoload
php database/migrate.php

# Lancer l'app
php -S localhost:8000 -t public

# Tester manuellement
# 1. Ajouter une tâche
# 2. La marquer comme terminée
# 3. La supprimer
```

## 🚀 Améliorations Possibles

### Court terme
- [ ] Validation côté serveur
- [ ] Édition des tâches
- [ ] Filtres par statut
- [ ] Messages flash

### Moyen terme
- [ ] Framework Laravel complet
- [ ] API REST
- [ ] Tests PHPUnit
- [ ] Authentification

### Long terme
- [ ] Docker + Docker Compose
- [ ] CI/CD GitHub Actions
- [ ] Deploy (Heroku/Vercel)
- [ ] Frontend SPA (React/Vue)

## 👤 Auteur

**Test technique** réalisé le 24/12/2025

---

## 📄 License

MIT

---

<div align="center">

**⭐ Si ce projet vous plaît, n'hésitez pas à le star !**

</div>
