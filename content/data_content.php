<?php
switch (check_url()) {
case '/':
?>
<p style="color:green">file system</p>
Главная страница:
<br>
content/ - расположение контента страниц<br>
<br>
template/ - шаблоны<br>
<br>
template/meta - метатеги <br>
template/script - js<br>
template/style - css<br>
<br>
system/ - система<br>
system/data.php - основные настройки<br>
system/function.php - функция php<br>
system/redirect.php - редиректы<br>
<?
break;
case '/catalog':
?>


Каталог контент




<?
break;
case '/catalog/podcatalog':
?>
Подкаталог
<?
break;    
default:
?>
<span style="color:red">Ячейка контента не создана</span>
<?
break;
}



?>