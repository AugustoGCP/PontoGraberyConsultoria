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
<meta charset="UTF-8">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>  -->


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dados de Membros</title>
</head>

<body>
  <div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a href="../index.php"><img src="../imgs/logo.png" width="85" height="70" alt=""></a>
      <a href="../index.php" class="navbar-brand">Controle de Ponto</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="login.html" class="nav-item nav-link">Acesso a Área Administrativa</a>
          <a href="sobre.html" class="nav-item nav-link">Sobre</a>

        </div>
      </div>
    </nav>
  </div>
  <div class="cardSobre m-lg-3">
    <div class="text-center">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">Curso</th>
            <th scope="col">Gerar Relatorio</th>

          </tr>
        </thead>

        <?php
        $linha = 1;
        while ($dados = $conex->fetch_array()) { ?>

          <tbody>
            <tr>
              <th scope="row"><?php echo $linha; ?> </th>
              <td value="<?php echo $dados['NOME_MEMBRO'];?>"><?php echo $dados['NOME_MEMBRO']; ?>
              </td>
              <td><?php echo $dados['CURSO_MEMBRO']; ?> </td>
              <td><button id="relatorio"class="btn btn-secondary btn-lg active relatorio" aria-pressed="true" onclick="nomeMembro()">Acessar Gerador</button></td>
            </tr>
          <?php $linha += 1;} ?>
          </tbody>
      </table>
      <script> 
            function nomeMembro(){
              var nome = document.getElementsByTagName("td").value
              console.log(nome)
            }
      </script>
      <a href="areaAdm.php" class="btn btn-dark btn-lg " role="button" aria-disabled="true">Voltar a Área
        Administrativa</a>
    </div>
  </div>
<!-- 
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group" style="text-align: center;">
            <label>Data Inicial</label>  
            <input type="date" name="bday">
          </div>
          <div class="form-group" style="text-align: center;">        
            <label>Data final</label>
            <input type="date" name="bday">
        </div>
        <div class="col text-center">
          <button type="button" class="btn btn-primary" aling="center"style="position: relative; margin-bottom: 10px;";>Primary</button>
        </div>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>     
  </tbody>
</table>

       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>     
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


</html>