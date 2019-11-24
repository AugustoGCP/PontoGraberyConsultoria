<?php
    //error_reporting(E_ERROR);
    include_once("../conexao.php");
    include_once("functions.php");
    session_start();

    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];
    $id_membro = $_POST['membros'];

    //var_dump($data_final, $data_inicial)
    

    if( (!empty($data_inicial)) && (!empty($data_final)) && (!empty($id_membro)) ){

        $sql = "SELECT tb_membros.ID_MEMBRO, tb_membros.NOME_MEMBRO, tb_ponto_membro.DATA_PONTO,tb_ponto_membro.HORA_ENTRADA, tb_ponto_membro.HORA_SAIDA, tb_ponto_membro.TOTAL_HORAS FROM `tb_ponto_membro` JOIN tb_membros ON tb_ponto_membro.ID_MEMBRO = tb_membros.ID_MEMBRO WHERE DATA_PONTO BETWEEN '$data_inicial' and '$data_final' and tb_membros.ID_MEMBRO = $id_membro";

        $conex = mysqli_query($conexao, $sql) or die ($conexao);
        
        arquivoPlanilha($conex);
        //var_dump($sql);
        exit;

    }else{
        $_SESSION['alert'] = "<script>alert('Filtros preenchidos incorretamente.')</script>";
        header('Location: ../../include/relatorios.php');
    }


    
    // $sql = "SELECT tb_membros.NOME_MEMBRO, tb_ponto_membro.DATA_PONTO, tb_ponto_membro.HORA_ENTRADA, tb_ponto_membro.HORA_SAIDA, tb_ponto_membro.TOTAL_HORAS FROM `tb_ponto_membro` JOIN tb_membros ON tb_ponto_membro.ID_MEMBRO = tb_membros.ID_MEMBRO";
    // $conex = mysqli_query($conexao, $sql) or die ($conexao);
    

    // $arquivo = "relatorio.xls";

    // $html = '';
    // $html .= '<table border="1">';
    // $html .= '<tr>';
    // $html .= '<th colspan ="5">Relatorio de Horas</th>';
    // $html .= '</tr>';

        
    // while($dados = $conex -> fetch_array()){
    //     $html .= '<tr>';
    //     $html .= '<td>'.$dados[0].'</td>';
    //     $html .= '<td>'.$dados[1].'</td>';
    //     $html .= '<td>'.$dados[2].'</td>';
    //     $html .= '<td>'.$dados[3].'</td>';
    //     $html .= '<td>'.$dados[4].'</td>';
    //     $html .= '</tr>';
    // }

    // $html.= '</table>';

    // header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
    // header("Content-Description: PHP Generated Data");
    // header("Content-Type: application/x-msexcel");
  

    // echo $html;
    // exit;

?>