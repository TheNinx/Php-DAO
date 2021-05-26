<?php
require_once("config.php");


 $fulano = new Pessoa();

 $fulano->CarregamentoPorID(2);

 echo $fulano;