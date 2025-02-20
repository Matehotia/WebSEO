<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">Contenu ajouté avec succès!</div>
                <?php endif; ?>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">Une erreur est survenue.</div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h2>Nouvel Article</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/S6Web/REFERENCEMENT%20NATUREL/Test/enregistrer-article" id="contentForm">
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenu</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('contentForm').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const content = document.getElementById('content').value.trim();

            if (!title || !content) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs');
            }
        });
    </script>
</body>
</html>
