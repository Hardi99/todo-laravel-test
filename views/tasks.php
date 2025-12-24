<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📝 Gestion de Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">📝 Ma Liste de Tâches</h1>
        
        <!-- Formulaire d'ajout -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">➕ Nouvelle tâche</h5>
                <form method="POST" action="/tasks">
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Titre *" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" rows="2" placeholder="Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>

        <!-- Liste des tâches -->
        <div class="row">
            <?php if (empty($tasks)): ?>
                <div class="col-12">
                    <div class="alert alert-info">Aucune tâche pour le moment. Créez-en une !</div>
                </div>
            <?php endif; ?>
            
            <?php foreach ($tasks as $task): ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($task->title) ?></h5>
                            <p class="card-text text-muted"><?= htmlspecialchars($task->description) ?></p>
                            <span class="badge bg-<?= $task->status->badge() ?> mb-3">
                                <?= $task->status->value ?>
                            </span>
                            <div class="small text-muted">
                                <div>Créée le: <?= date('d/m/Y H:i', strtotime($task->created_at)) ?></div>
                                <div>Modifiée le: <?= date('d/m/Y H:i', strtotime($task->updated_at)) ?></div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <?php if ($task->status !== \App\Enums\TaskStatus::DONE): ?>
                                <form method="POST" action="/tasks/<?= $task->id ?>/complete" class="d-inline">
                                    <button class="btn btn-success btn-sm">✓ Terminer</button>
                                </form>
                            <?php endif; ?>
                            <form method="POST" action="/tasks/<?= $task->id ?>/delete" class="d-inline">
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette tâche ?')">🗑 Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
