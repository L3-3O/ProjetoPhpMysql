<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fotos</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Enviar Nova Imagem</h4>
                </div>
                <div class="card-body">
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- Nome da Imagem -->
                        <div class="mb-3">
                            <label for="nome_foto" class="form-label">Nome da Imagem</label>
                            <input type="text" class="form-control" id="nome_foto" name="nome_foto" maxlength="50" required placeholder="Ex: Banner Principal">
                        </div>

                        <!-- Seleção do Arquivo -->
                        <div class="mb-3">
                            <label for="imagem" class="form-label">Selecione a Imagem (JPG ou PNG)</label>
                            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/jpeg, image/jpg, image/png" required>
                            <div class="form-text">A imagem será convertida para WebP e ajustada automaticamente.</div>
                        </div>

                        <!-- Botão de Envio -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Salvar e Processar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

