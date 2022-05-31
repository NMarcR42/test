<?php
require_once 'param.php';
require_once 'PlatDAO.php';


print(json_encode(PlatDAO::supprimer($_POST['nom'])));
