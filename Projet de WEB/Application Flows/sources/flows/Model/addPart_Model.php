<?php

	/* check if there is no partner that have the same name whose is in the parameter */
	$sql="select count(*) from partner where name='".$name."'";
	$resultrech = $dbh->query($sql);
	$result = $resultrech->fetch();
	$count = $result[0];
	
	if($count==0){
		/* Get the Id of the environment that we had chosen */
		$sql = "select id from environment where name ='".$env."'";
		$resultrech = $dbh->query($sql);
		$result = $resultrech->fetch();
		(int)$environ = $result[0];

		/* Add the description of the partner */
		$sql2="insert into description(idenv,localisation,ipadr,dns,server,compte) values($environ,'$loc','$ip','$dns','$server','$access')";
		$result = $dbh->query($sql2);
		
		/* Get the last description that we stored in the DB (The appropriate description for the partner) */
		$sql = "select MAX(iddesc) from description";
		$resultrech = $dbh->query($sql);
		$result = $resultrech->fetch();
		(int)$max = $result[0];

		/* Adding the partner into the DB */
		$sql2="insert into partner(name,id_desc,restricted_name,description,contact,tech_contact,tech_desc) values('$name',$max,'$name_mid','$description','$contacts','$tech_cont','$tech_desc')";
		$result = $dbh->query($sql2);

		/* Close the query */
		$resultrech->closeCursor();

	}else{
		/* Redirection because of errors */
		header('Location: ../View/addPartner_error.php'); exit();
	}


	

?>