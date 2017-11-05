<?php
	try{ //tente
		$condominio = new PDO("mysql:host=localhost;dbname=abbacondominio","root","");
		//echo "Conexão efetuada com sucesso";
	} 
	catch(PDOException $e){ //Bloco correspondente ao try	
		// verificar var_dump($e);
		// verificar método echo $e->getCode(); 
		echo $e->getMessage();	
	}
?>	