<?php

require_once 'param.php';
require_once 'PlatDAO.php';


print(json_encode(PlatDAO::ajouter($_POST['categorie'],$_POST['nom'],$_POST['descriptif'])));

