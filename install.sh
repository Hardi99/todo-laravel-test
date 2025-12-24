#!/bin/bash
echo "🚀 Installation ToDo App Laravel-style"
echo ""

# Étape 1
echo "📦 Génération autoload..."
composer dump-autoload -q

# Étape 2
echo "🗄️  Initialisation base de données..."
php database/migrate.php

# Étape 3
echo "✅ Installation terminée !"
echo ""
echo "Pour lancer l'application:"
echo "  php -S localhost:8000 -t public"
echo ""
echo "Puis ouvrir: http://localhost:8000"
