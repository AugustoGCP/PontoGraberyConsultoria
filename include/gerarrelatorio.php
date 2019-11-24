
<?php
include_once("../php/conexao.php");
session_start();

$sql = "SELECT * FROM tb_membros ORDER BY  NOME_MEMBRO asc";
$conex = mysqli_query($conexao, $sql) or die($conexao);

//include_once("../php/manutencao/cadastro_ponto_membros.php");
//var_dump($_SESSION['alert']);

if (isset($_SESSION['alert'])) {
  echo $_SESSION['alert'];
  session_unset();
  //exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="bs-example">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a href="../index.php"><img src="../imgs/logo.png" width="85" height="70" alt=""></a>
                <a href="" class="navbar-brand">Controle de Ponto</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="login.html" class="nav-item nav-link">Acesso a Área Administrativa</a>
                        <a href="sobre.html" class="nav-item nav-link">Sobre</a>
                    </div>
                </div>
    </header>
    <div class="container col-md-4">
        <form action="../php/manutencao/relatorios_exporta.php" method="POST">
            <div class="jumbotron m-lg-1" align="center">
            <div class="form-group">
                    <label for="exampleInputPassword1">Gerador de Relatorio</label>
                    <script src="DadosPonto.php">
                        document.getElementById
                    </script>
                    <div class="form-group" id="recebe">
                
                    </div>
                </div>
                <form action="../php/manutencao/relatorios_exporta.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">                   
                    <select name="membros" id="membros" class="form-control">
                        <option value="disable" disabled selected>Escolha o nome do Membro</option>
                        <?php while($dados = $conex->fetch_array()) { ?>
                            <option value="<?php echo $dados['ID_MEMBRO'];?>"><?php echo $dados['NOME_MEMBRO'];?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Data inicial</label>
                    <input type="date" name="data_inicial">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Data Final</label>
                    <input type="date" name="data_final">
                </div>
                <!-- <a href="gerarrelatorio.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Gerar</a> -->
                <input type="submit" value="Gerar Relatório" class="btn btn-secondary btn-lg active" aria-pressed="true">
                </form>
            </div>
        </form>
    </div>


</body>

</html>