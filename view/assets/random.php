<?php

  //Funcion para crear un linea de caracteres random

  function randAlphanum($length){
    $chatacters= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength= strlen($characters);
    $randomAlpha= '';
    for ($i= 0; $i < $length; $i++){
      $randomAlpha .= $characters[rand(0,$charactersLength - 1)];
    }
    return $randomAlpha;
  }
?>
