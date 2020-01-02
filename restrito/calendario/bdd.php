<?php
try
{
	$bdd = new PDO('mysql:host=sql104.byetcluster.com;dbname=epiz_24573178_agenda;charset=utf8', 'epiz_24573178', 'p7EKGFX3Dpm');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
