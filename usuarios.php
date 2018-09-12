<?php

$arquivo="usuarios.json";

if (file_get_contents($arquivo)) {
  $dados=file_get_contents($arquivo);
  $dados=json_decode($dados,true); // p array associativo // adicionei , true para tornar o array associativo// sem ele ele retorna um objeto.
  $dados["usuarios"][]=$_POST;
  $formdados=json_encode($dados); //json string
 file_put_contents($arquivo,$formdados);
 echo "inserido com sucesso";
}else{
  $dados=["usuarios"=>[]];
  $dados["usuarios"][]=$_POST;
  $formdados=json_encode($dados); //json string
  file_put_contents($arquivo,$formdados);
  echo "arquivo criado";
}






 ?>
