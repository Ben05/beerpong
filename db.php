<?php
	
		  try{
         $pdo = new PDO(
            'mysql:host=localhost;dbname=acaiwebc_beerpong',
            'acaiwebc_root',
            'hcd1$mch',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
         $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		
		}
      catch(Exception $e) {
         die($e->getMessage());
      }
?>