<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenu Formaté</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Contenu Formaté</h2>
                    </div>
                    <div class="card-body">
                        <!-- Affichage du contenu formaté -->
                        <?php if ($content): ?>
                            <div class="formatted-content">
                                <?php echo $content['formatted_content']; ?>
                            </div>
                            <hr>
                        <?php else: ?>
                            <p>Aucun contenu trouvé.</p>
                        <?php endif; ?>
                        
                        <div class="mt-4">
                            <a href="index.php" class="btn btn-primary">Retour au formulaire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
