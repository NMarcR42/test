<?php

require_once 'param.php';
require_once 'PlatDAO.php';


print(json_encode(PlatDAO::modifier($_POST['ncategorie'],$_POST['nnom'],$_POST['ndescriptif'],$_POST['anomPlat'])));

