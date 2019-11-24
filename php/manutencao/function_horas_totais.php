<?php

$separador_entrada = explode(":",$dados['HORA_ENTRADA']);
          $separador_saida = explode(":",$hora_saida);

          //Isola os dados dentro do Array em variáveis sepradas.
      
          $hora_in = (int) $separador_entrada['0'];
          $minuto_in = (int) $separador_entrada['1'];
          $segundo_in = (int) $separador_entrada['2'];

          //Isola os dados dentro do Array em variáveis sepradas.
      
          $hora_out = (int) $separador_saida['0'];
          $minuto_out = (int) $separador_saida['1'];
          $segundo_out = (int) $separador_saida['2'];

          //Subtrai a diferenca das horas, minutos e segundos.
      
          $hora_total = abs($hora_out - $hora_in);
          $minuto_total = abs($minuto_out - $minuto_in);
          $segundo_total = abs($segundo_out - $segundo_in);

          //Uni as variáveis em um Array e converte o Array em um String
      
          $uniao = array ($hora_total, $minuto_total, $segundo_total);
          $horas_total = implode(":", $uniao);

?>