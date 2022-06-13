<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/MediPOS/router.php");

get('/','Views/login.php');
post('/','Views/login.php');

get('/pos','Views/post.php');



#any('/404','Views/404.php');
?>