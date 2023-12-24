<?php
switch (check_url()) {
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