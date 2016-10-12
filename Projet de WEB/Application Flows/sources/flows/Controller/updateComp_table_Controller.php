<?php
	session_start();
  
	if(!$_SESSION['owner'])
	{
		header('Location: ../index.php');
	}
	
	require_once '../Config/BD_Conn.php';

  // add the query that gives the name owner
    require_once '../Model/owner_Model.php';

  // get only the environment name
  require_once '../Model/getEnvName_Model.php';
  
  $id  = $_GET["mid"] ;
    $id = str_replace("\"", "&quot;", $id);
    $id = str_replace('\'', "&apos;", $id);

  $_SESSION["dropName"] = $id;

  require_once '../Model/updateDataComp_table_Model.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
        <title>Flows</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="../assets/css/styles.css" />
		
		<link rel="stylesheet" media="screen and (min-width: 1300px)" href="../assets/css/largeStyle.css" />
        
        <!-- Including the Lobster font from Google's Font Directory -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Bungee+Shade|Oswald|Suez+One|Yatra+One" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <link rel="icon" type="image/png" href="../assets/img/2.PNG" />
        
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/script.js"></script>
    </head>
    
    <body>

        <!-- Header of the the page that containt the logo of engie and the name of the application and the menu -->
        <header>
            <div class='menuItems'>
                <img class='logo' src="../assets/img/logo-scroll.png" alt="engie">
                <h2>Flows</h2>
                </br>
            </div>  
            <ul id="menu">
                <li><a href="#" class='welcome'> <img src='../assets/img/user.png' alt='Welcome' /><?php echo("   Welcome ".strtoupper($owner[0]).""); ?></a></li>
                <li><a href="../View/flows.php" class='flows'> <img src='../assets/img/flows.png' alt='Flows' />   Flows</a></li>
                <li><a href="../View/middleware.php" class='middleware'> <img src='../assets/img/server.png' alt='Middleware' />   Middlewares</a></li>
                <li><a href="../View/component.php" class='component2'> <img src='../assets/img/component.png' alt='Components' />   Components</a></li>
                <li><a href="../View/partner.php" class='partner'> <img src='../assets/img/partner.png' alt='Partners'  />   Partners</a></li>
                <li><a href="../View/environment.php" class='environment'> <img src='../assets/img/environment.png' alt='Environments' />   Environments</a></li>
                <li class='logout'><a href="../Controller/logout.php"> <img src='../assets/img/logout.png' alt='Logout' />   Logout</a></li>
            </ul>
        </header>
    </br></br></br>
        
        <div class="addEdit_BTN" id='midBTN'>
            </br>
            <a href="../View/uploadFileComponents.php" id="a1"> <img src="../assets/img/add.png"> <span><b>Add components file</b></span></a>
            <a href="../View/addComponent.php" id="a3"> <img src="../assets/img/a2.png"> <span><b>Add component</b></span></a>
            <a href="../View/editComponent.php" id="a2"> <img src="../assets/img/s21.png"> <span><b>Edit component</b></span></a>
        </div></br></br></br>
        
        <fieldset class="add_midd">
            
                <form method = "POST" action = "../Controller/modifyComp_table_Controller.php" name = "form_add_comp">
                    <table class="table_add">
                       <tr>  
                        <tr>
                          <td class="line"> <label><b>Name</b></label> </td>
                          <td class="line"> <?php echo("<input required type='text' name='name_mid' value='".$id."' >"); ?> </td>
                       </tr>
                       <tr hidden='true';>
                          <td class="line"> <label><b>Environment</b></label> </td>
                          <td class="line"> 
                            <SELECT name="select_env" size="1" >
                                <?php
                                    while($Environment = $resultRechNameEnv->fetch()){
                                        echo("<OPTION>$Environment[0]");
                                    }
                                ?>     
                            </SELECT>
                          </td>
                       </tr>

                       <tr>
                          <td class="line"> <label><b>Description</b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='desc'>".$description."</textarea>"); ?> </td>
                       </tr>


                       <tr>
                          <td class="line"> <label><b>Contacts</b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='contacts'>".$contacts."</textarea>"); ?> </td>
                       </tr>

                       <tr>
                          <td class="line"> <label><b>Technical contacts</b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='tech_cont'>".$tech_cont."</textarea>"); ?> </td>
                       </tr>

                       <tr>
                          <td class="line"> <label><b>Localisation</b></label> </td>
                          <td class="line"> <?php echo("<input type='text' name='loc' value='".$loc."' >"); ?> </td>
                       </tr>

                       <tr>
                          <td class="line"> <label><b>Technical description</b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='tech_desc'>".$tech_desc."</textarea>"); ?> </td>
                       </tr>

                       <tr>
                          <td class="line"> <label><b>Server name</b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='name_server'>".$server."</textarea>"); ?> </td>
                       </tr>
                       <tr>
                          <td class="line"> <label><b>IP Addresses<b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='ip'>".$ip."</textarea>"); ?> </td>
                       </tr>
                       <!--<tr>
                          <td class="line"> <label><b>Port</b></label> </td>
                          <td class="line"> <?php //echo("<input type='text' name='port' value='".$port."' >"); ?> </td>
                       </tr>-->
                       <tr>
                          <td class="line"> <label><b>DNS</b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='dns'>".$dns."</textarea>"); ?> </td>
                       </tr>
                       <tr>
                          <td class="line"> <label><b>Acces account</b></label> </td>
                          <td class="line"> <?php echo("<textarea rows='3' cols='50' name='account'>".$access."</textarea>"); ?> </td>
                       </tr>
                  </table>

                    <input type='submit' name='modif_mid' id='modif_mid' value="Modify"  >
        
                </form>
        </fieldset>
        

        <?php
            echo("
                </br>
                <footer>
                    <div class='bas'>
                          
                      <div id='corp' style='display: inline;'> </br>
                          <p><b>© 2016 ENGIE IT Corporation. All Rights Reserved</b></p> 
                          <a href='mailto:mehdi.mtougui@engie.com'> <img src='../assets/img/outlook.png' alt='Contact' /></a> <a class='contact' href='mailto:mehdi.mtougui@engie.com'>Contact</a>
                      </div>
                      <img src='../assets/img/flux.PNG' style='margin-top:10px;'>
                    </div>
                </footer></br>"
            );
        ?>
    
  </body>
</html>

