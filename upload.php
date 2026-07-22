<?php
// Inclui o seu arquivo de conexão
require_once __DIR__ . '/componentes/conexao.php';

// Define o fuso horário para garantir a hora correta
date_default_timezone_set('America/Fortaleza');
$con=config::connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    
    $nome_foto = filter_input(INPUT_POST, 'nome_foto', FILTER_SANITIZE_SPECIAL_CHARS);
    $arquivo = $_FILES['imagem'];
    
    // 1. Validação do formato do arquivo (Apenas JPG e PNG no upload)
    $extensoes_permitidas = ['image/jpeg', 'image/jpg', 'image/png'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $arquivo['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime_type, $extensoes_permitidas)) {
        die("Erro: Apenas imagens nos formatos JPG ou PNG são permitidas.");
    }

    // 2. Criar recurso de imagem em memória
    if ($mime_type === 'image/png') {
        $img_original = imagecreatefrompng($arquivo['tmp_name']);
    } else {
        $img_original = imagecreatefromjpeg($arquivo['tmp_name']);
    }

    // 3. Redimensionamento Proporcional (máximo 1024px)
    $largura_orig = imagesx($img_original);
    $altura_orig = imagesy($img_original);
    $max_dimensao = 1024;

    if ($largura_orig > $max_dimensao || $altura_orig > $max_dimensao) {
        if ($largura_orig >= $altura_orig) {
            $nova_largura = $max_dimensao;
            $nova_altura = round(($altura_orig / $largura_orig) * $max_dimensao);
        } else {
            $nova_altura = $max_dimensao;
            $nova_largura = round(($largura_orig / $altura_orig) * $max_dimensao);
        }
    } else {
        $nova_largura = $largura_orig;
        $nova_altura = $altura_orig;
    }

    $img_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    
    // Preservar transparência de fundo (se houver no PNG)
    imagealphablending($img_redimensionada, false);
    imagesavealpha($img_redimensionada, true);
    
    imagecopyresampled(
        $img_redimensionada, $img_original, 
        0, 0, 0, 0, 
        $nova_largura, $nova_altura, $largura_orig, $altura_orig
    );

    // 4. Salvar na pasta /fotos convertendo para WebP (máximo 120KB)
    $pasta = 'fotos/';
    if (!is_dir($pasta)) {
        mkdir($pasta, 0755, true);
    }

    $nome_arquivo_salvo = uniqid('img_') . '_' . time() . '.webp';
    $caminho_final = $pasta . $nome_arquivo_salvo;
    
    // Algoritmo de redução de qualidade até atingir < 120KB
    $qualidade = 85; 
    $max_bytes = 120 * 1024; // 120KB em bytes

    do {
        imagewebp($img_redimensionada, $caminho_final, $qualidade);
        $tamanho_arquivo = filesize($caminho_final);
        $qualidade -= 10;
    } while ($tamanho_arquivo > $max_bytes && $qualidade >= 10);

    // Liberar a memória dos recursos de imagem
    imagedestroy($img_original);
    imagedestroy($img_redimensionada);

    // 5. Inserção no banco utilizando a variável $con fornecida pelo conexao.php
    try {
        $sql = "INSERT INTO fotos_sistema (nome_foto, pasta, extensao, status, hora_registro) 
                VALUES (:nome_foto, :pasta, :extensao, :status, :hora_registro)";
        
        // Supondo PDO na sua classe Config::connection()
        if ($con instanceof PDO) {
            $stmt = $con->prepare($sql);
            $stmt->execute([
                ':nome_foto'     => substr($nome_foto, 0, 50),
                ':pasta'         => $pasta,
                ':extensao'      => 'webp',
                ':status'        => 1,
                ':hora_registro' => date('H:i:s')
            ]);
        } 
        // Alternativa caso sua conexão $con utilize MySQLi
        else if ($con instanceof mysqli) {
            $stmt = $con->prepare("INSERT INTO fotos_sistema (nome_foto, pasta, extensao, status, hora_registro) VALUES (?, ?, ?, ?, ?)");
            $ext = 'webp';
            $status = 1;
            $hora = date('H:i:s');
            $nome_limitado = substr($nome_foto, 0, 50);
            
            $stmt->bind_param("sssis", $nome_limitado, $pasta, $ext, $status, $hora);
            $stmt->execute();
        }

        echo "<div style='padding: 20px; font-family: sans-serif; color: green;'>
                <strong>Sucesso!</strong> Imagem processada, convertida para WebP e salva no banco de dados.
              </div>";

    } catch (Exception $e) {
        die("Erro ao salvar no banco de dados: " . $e->getMessage());
    }
}
?>