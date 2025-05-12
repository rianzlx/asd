





<?php
require_once('topo/conexao.php');
require_once('classes/produto_insercao.php');

// Inicializa a sessão, caso ainda não tenha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = new Produto($conn);
    $produto->setnome_produto($_POST['nome_produto']);
    $produto->setpreco_produto($_POST['preco_produto']);

    // Se a operação for de edição, executa a atualização
    if ($_REQUEST['opt'] === 'edi') {
        $id_produto = $_REQUEST['id'];
        $produto->setid_produto($id_produto);
        $produto->update('img_produto');
    } else {
        // Se for para adicionar um novo produto, executa a inserção
        $produto->insert('img_produto');
    }
}

// Caso a operação seja edição, carrega os dados do produto
$produto = new Produto($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto->setnome_produto($_POST['nome_produto']);
    $produto->setpreco_produto($_POST['preco_produto']);

    if (isset($_REQUEST['opt']) && $_REQUEST['opt'] === 'edi') {
        $id_produto = $_REQUEST['id'];
        $produto->setid_produto($id_produto);
        $produto->update('img_produto');
    } else {
        $produto->insert('img_produto');
    }
}

if (isset($_REQUEST['opt']) && $_REQUEST['opt'] === 'edi') {
    $id = $_REQUEST['id'];
    $produto->setid_produto($id);
    $produto->loadEditar();

    $nome_produto = $produto->getnome_produto();
    $preco_produto = $produto->getpreco_produto();
    $img_produto = $produto->getimg_produto();
}

if (isset($_REQUEST['opt']) && $_REQUEST['opt'] === 'del') {
    $id = $_REQUEST['id'];
    $produto->setid_produto($id);
    $produto->delete();
}

?>
<html>
<html lang="pt-br">

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <title>Projetos</title>

  <!-- links de fontes -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">


  <!-- links de arquivos -->

  <link rel='stylesheet' type='text/css' media='screen' href='css/projetospg.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/principal.css'>
  <script async defer src='/js/home.js'></script>

</head>

<body>
  <header>
    <nav>
      <ul>
        <li style="list-style: none;" class="nav-item"><a href="index.html" style="text-decoration: none;">Home</a></li>
        <li style="list-style: none;" class="nav-item"><a href="quem_somos.html" style="text-decoration: none;">Quem
            Somos?</a></li>
      </ul>
    </nav>

    <div class="barra_de_pesquisa">
      <input placeholder="Pesquise aqui" class="texto_da_pesquisa">
      <img class="icone" src="imagens/lupa.png">
    </div>
  </header>

  <section class="page1">
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 1</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 2</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 3</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 4</div>
    </div>
  </section>
  <section class="page2">
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 5</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 6</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img  src="<?= $url ?>arquivo/<?= $img_produto ?>" >
        <div class="overlay">
          <div class="text">/div>
        </div>
      </div>
      <div class="desc">PROJETO 7</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 8</div>
    </div>
  </section>
  <section class="page3">
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 9</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 10</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 11</div>
    </div>
  
    <div class="gallery">
      <div class="image-wrapper">
        <img src="imagens/user.png">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
      <div class="desc">PROJETO 12</div>
    </div>
  </section>
</body>

</html>