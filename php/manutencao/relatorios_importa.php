<?php
	include_once("../conexao.php");
	session_start();
	
	//  $dados = $_FILES['arquivo'];
	//  var_dump($dados);
	
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$rows = $arquivo->getElementsByTagName("tr");
		//var_dump($linhas);
		
		$dados_linha = 1;
		
		foreach($rows as $row){

			if($dados_linha >= 3){

				$id_membro = $row->getElementsByTagName("td")->item(0)->nodeValue;

				$nome_membro = $row->getElementsByTagName("td")->item(1)->nodeValue;
				//echo "Nome: $nome_membro <br>";
				
				$data_ponto = $row->getElementsByTagName("td")->item(2)->nodeValue;
				//echo "Data: $data_ponto <br>";
				
				$hora_entrada = $row->getElementsByTagName("td")->item(3)->nodeValue;
				//echo "Hora de Entrada: $hora_entrada <br>";

				$hora_saida = $row->getElementsByTagName("td")->item(4)->nodeValue;
				//echo "Hora de Saida: $hora_saida <br>";

				$total_horas = $row->getElementsByTagName("td")->item(5)->nodeValue;
				//echo "Horas Total: $total_horas <br>";
				
				//echo '<br>';
				
				//Inserir o usuário no BD
				$sql = "INSERT INTO tb_ponto_membro (ID_MEMBRO, DATA_PONTO, HORA_ENTRADA, HORA_SAIDA, TOTAL_HORAS) VALUES ($id_membro,'$data_ponto','$hora_entrada','$hora_saida','$total_horas')";

				$conex = mysqli_query($conexao, $sql) or die ($conexao);

					
				
				//echo "<hr>";
			}

			 $dados_linha += 1;
		}

		if($conex = true){
			$_SESSION['alert'] = "<script>alert('Cadastro feito com sucesso!')</script>";
			header('Location: ../../include/relatorios.php');
		}else{
			echo 'Deu errado';
		}
	}
?>