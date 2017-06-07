<?php
try {
	$db = new PDO("sqlite:".__DIR__."/database.db");
	$db->setAttribute(PDO::ATTR_ERRORMODE,PDO::ERRORMODE_EXCEPTION);
}catch(Excception $e){
	echo $e->getMessage();
}