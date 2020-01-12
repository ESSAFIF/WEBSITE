<?php
                            $result=" ";
							$name= $email=  $message="";
							$nameError= $emailError=  $messageError="";
							$isSuccess=false;  
							
							 if ($_SERVER["REQUEST_METHOD"]=="POST")
								 
							 {
								     $name=verifyInput($_POST['name']);
                                    $email=verifyInput($_POST['email']);
                                    $message=verifyInput($_POST['message']);
									$isSuccess=true; 
									
									if (empty($name)){
										$nameError= "votre nom svp!";
										$isSuccess=false;
									}
								
									
									if (empty($message)){
										$messageError= "votre message svp!";
										$isSuccess=false;
									}
									
									if (!ifEmail($email)){
										$emailError= "votre email svp!";
										$isSuccess=false;
									}
									
									if ($isSuccess){
										 require('PHPMailer/PHPMailerAutoload.php');
									
										$output='Contact persone name  '.$name.' <br> Email:  '.$email.'  <br> Message:  '.$message.' ' ;
									
										$mail = new PHPMailer;

										$mail->isSMTP();
										$mail->Host = 'smtp.gmail.com';
										$mail->Port = 587;
										$mail->SMTPAuth = true;
										$mail->SMTPSecure = 'tls';

										$mail->Username = 'fouzi.essafi.pro@gmail.com';
										$mail->Password ='projeteisti2019';

										$mail->setFrom($_POST['email']);
										$mail->addAddress('fouzi.essafi22@gmail.com');

										$mail->isHTML(true);
										$mail->Subject = 'test';
										$mail->Body=$output;
										$mail->send();
									}
									
							 }
							 
							  function ifEmail($var){
									
								return filter_var($var,FILTER_VALIDATE_EMAIL);
							 }
							 
							 function verifyInput($var){
								$var=trim($var);
								$var=stripcslashes($var);
								$var=htmlspecialchars($var);
								return $var;
							 }
					
                            
                          
?>
<!DOCTYPE hrml>
<html>
    
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TopFilms</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       
    
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet"> 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="styles.css">  

   
   
	 <script src="script.js"></script>
	     <script type="text/javascript">

			<?php if(isset($_POST['send'])) { ?> /* Your (php) way of checking that the form has been submitted */

						$(function() {                       // On DOM ready
							$('#form').modal('show');     // Show the modal
						});

			<?php } ?> 
			/* /form has been submitted */
		
		
        </script>

    </head>
    
    <body >
      
        <div class="container-fluid" >
        <header role="banner" >
		<div id="cd-logo"><h1 class="navbar-brand">TopFilm<span class="orange">.</span></h1></div>
            
        <div class="cd-signup"><a href="#" data-toggle="modal" data-target="#form"> Contact</a></div> 
				
		<div class="modal  " style="postion:fixed;top:1%;left:5%;right:5%;" id="form"  >
						  <div class="modal-dialog modal-dialog-centered" >
							<div class="modal-content">
                           
							  <div class="modal-header border-bottom-0">
                                    
								<h1 class="modal-title" >Contactez-nous</h1>
								
							  </div>
                          <p class="text-center text-success" id="isSuccess"style="display:<?php if($isSuccess) echo 'block';else echo 'none'; ?>"> votre message a bien été envoyé </p>
							  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="myForm">
								<div class="modal-body">
								  
								   <div class="col-sm-12 form-group">
										<label for="message"> Message:</label>
										<textarea class="form-control" type="textarea" id="message" name="message"   placeholder="Entrer votre message" maxlength="2000" rows="5" required>
										<?php echo $message; ?>
										</textarea>
										<p class="error-messages "><?php echo $messageError; ?></p>
										
									</div>
									
									
								  <div class="row">
									<div class="col-sm-6 form-group">
										<label for="name">
											Your Name:</label>
										<input type="text" class="form-control" id="name" name="name" value="<?php echo $name ;?>" placeholder="Name"  required>
											<p class="error-messages "> <?php echo $nameError; ?></p>
									</div>
									<div class="col-sm-6 form-group">
										<label for="email">	Email:</label>
										<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="email"  required>
										<p class="error-messages "> <?php echo $emailError; ?></p>
									</div>
								</div>

								  
								</div>
								<div class="modal-footer border-top-0 d-flex justify-content-center">
								  <button type="submit" class="btn btn-success" name="send">Envoyer</button>
								</div>
							
							  </form>
                              
                                   <div class="modal-footer">
                                    <button type="button" id="myBtn" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                  </div>
							</div>
						  </div>
						</div>
				
						<!--
                              <div class="customer-logos slider xs-6 sm-4 md-3">
                          <div class="slide"><img  width="21" height="21" src="images/pathe%CC%81-logo.png"></div>
                          <div class="slide"><img  width="21" height="21" src="images/logo_cgr.png"></div>
                          <div class="slide"><img  width="21" height="21" src="images/megarama.jpeg"></div>
                       <div class="slide"><img  width="21" height="21" src="images/pathe%CC%81-logo.png"></div>
                          <div class="slide"><img  width="21" height="21" src="images/logo_cgr.png"></div>
                          <div class="slide"><img  width="21" height="21" src="images/megarama.jpeg"></div>
                        <div class="slide"><img  width="21" height="21" src="images/pathe%CC%81-logo.png"></div>
                          <div class="slide"><img  width="21" height="21" src="images/logo_cgr.png"></div>
                          <div class="slide"><img  width="21" height="21" src="images/megarama.jpeg"></div>
        </div>        
		-->
			
		
	</header>


    </div>   
       
         <div class="container-fluid" >
     
            <div class="affiche" >
                <span> Films à l'affiche </span>                     
             </div>
          </div>    
        <div class="container-fluid">
            <div class="search-filter">
           
                     <input placeholder="Search" id="search-users" class="search-users" type="text" autofocus>
               <div  class="filter-btn-content">
                <button id="filter-btn"  type="button" class="btn btn-successful "><i class="fa fa-sort mr5 " ></i> Filter </button> </div>
            </div>    
        </div>   
    
           <div id="filter"  >  
             <div class="filter-content" >
			  
                       
                <ul class="fc-genre-list">
                 <div class="close-btn">
                 <button id="filterclose" style="background:#eee;border-color:#eee;" type="button" ><img src="images/close.png"  width="16" height="16" alt="X" /></button> </div>
			
                
                    <span class="fc-title"> Genre</span>
                    <li>  <input  value="Action" id="Action" name="genres" type="checkbox"> <label for="Action">Action </label> </li>
                     <li>  <input value="Aventure" id="Aventure" name="genres" type="checkbox"> <label for="Aventure">Aventure </label> </li>
                     <li>  <input value="Animation" id="Animation" name="genres" type="checkbox"> <label for="Animation">Animation </label> </li>
                     <li>  <input value="Comedie" id="Comedie" name="genres" type="checkbox"> <label for="Comedie">Comedie </label> </li>
                     <li>  <input value="Policier" id="Policier" name="genres" type="checkbox"> <label for="Policier">Policier </label> </li>
                     <li>  <input type="checkbox" value="Drame" id="Drame" name="genres" > <label for="Drame">Drame </label> </li>
                     <li>  <input value="Famille" id="Famille" name="genres" type="checkbox"> <label for="Famille">Famille </label> </li>
                     <li>  <input value="Histoire" id="Histoire" name="genres" type="checkbox"> <label for="Histoire">Histoire </label> </li>
                     <li>  <input value="Epouvante" id="Epouvante" name="genres" type="checkbox"> <label for="Epouvante">Epouvante </label> </li>
                    <li>  <input value="Romance" id="Romance" name="genres" type="checkbox"> <label for="Romance">Romance </label> </li>
                    <li>  <input value="Sport" id="Sport" name="genres" type="checkbox"> <label for="Sport">Sport </label> </li>
                     <li>  <input value="Western" id="Western" name="genres" type="checkbox"> <label for="Western">Western </label> </li>
                    
                </ul> 
           
            </div>
          
          </div>
             
        <div class="container-fluid" style="margin-left:15px;" >
					
				<div class="container-fluid my-4">	
                    <div class="flex-row row" >
                          <?php
                            require 'database.php';
                            $db=Database::connect();
                          $dataArray = array();
                     

                            $statement= $db->query('SELECT A.num_film,title,dateRelease,note_imdb,note_allocine,kind,synopsis,duration,country,photo,video, CONCAT(B.surname, " ", B.name ) as director,actors,cinemas
                            FROM film as A LEFT JOIN  individual as B ON A.num_ind=B.num_ind LEFT join
                            (SELECT num_film, GROUP_CONCAT(CONCAT(B.surname, " ",  B.name ) SEPARATOR ", ") as actors
                            FROM play as A LEFT JOIN individual as B ON A.num_ind=B.num_ind GROUP BY num_film) as C on A.num_film=C.num_film 
                           LEFT join
                            (select num_film, GROUP_CONCAT(cinema SEPARATOR "<br>") as cinemas from 
							(SELECT num_film,  E.num_cine,name,address,CONCAT(E.name, " - ",  E.address )  as cinema
                            FROM projection as D LEFT JOIN cinema as E ON D.num_cine=E.num_cine GROUP BY num_film,E.num_cine) as A
                            group by num_film) as F on A.num_film=F.num_film 
                            ORDER BY  dateRelease desc,title ');
                                    
                                        while( $films=$statement->fetch())
                                            
                                        {

                                                      $today = date("Y-m-d");
                                                      $expires = $films['dateRelease'] ;
                                                 
                                                      $day_num = date('N', strtotime($today));
                                                        $ts1 = strtotime($today);
                                                        $ts2 = strtotime($expires);
                                                   

                                                        $date1 = date_create($today);
                                                        $date2= date_create($expires);

                                                        $diff = $date2->diff($date1)->format("%a");
                                                        $kinds= str_replace(',', ' ', $films['kind']);
                                                          /*  echo "diff: " . $kinds .  "<br>";*/
                                                       if( (3<$day_num && $diff<5  && 0<=$diff) || ($day_num<3 && 0<= $diff  && $diff<=(7-$day_num+1))){
                                                            $new= 'Nouveau';
                                                                }else {
                                                            $new= '';
                                                       }
                                                     
                                                        
                                                      echo '<div style=" margin-right: 10px ;" >
                                                      <div class="thumbnail" style=" margin-right: 10px ;border-radius: 5px 5px 5px 5px;margin-bottom: 15px;background:#333;">
                                                      
                                                       
                                                        <div class="movie ' . $kinds . ' ">
                                                        <div  class="user-data" style="display: none;">' . $films['title'] . '</div>
                                                        <p style="display: none;">' . $kinds . '</p>
                                                        
                                                         <div class="new" ><span > ' . $new . ' </span></div>';
                                                        /*
                                                        echo ' <div class="video-wrapper">';
                                                        echo '  <video src="' . $films['video'] . '" poster="' . $films['photo'] . '/400/600"></video>';
                                                        echo '</div>';
                                                        echo ' <div class="card-body">';
                                                    */
                                                 
                                                       echo ' 
                                                        <div >';
                                                            echo ' <img style="width: 199px; height: 249px;" class="img-responsive" src="' . $films['photo'] . '">';
                                                        echo '</div>';
                                                      
                                                        echo ' 
                                                        
                                                            <div >
                                                           <div  style="background:yellow;">
                                                            <a href="#myModal2-' . $films['num_film'] . '" data-toggle="modal"><img src="images/icon-play.png"  alt="Voir les détails" width="21" height="21"/></a>';
                                                                        
                                                          echo ' <a href="#myModal1-' . $films['num_film'] . '" data-toggle="modal"><img src="images/icon-info.png"  alt="Voir la bande annonce" width="21" height="21"/></a>
														   <a href="#myModal3-' . $films['num_film'] . '" data-toggle="modal"><img src="images/popcorn.png" alt="Voir la bande annonce" width="21" height="21"/></a>
                                                         
														  
														  
														  </div>  
                                                           
                                                        </div>';
                                            
                                                        echo '<br>';
                                                     
                                                        echo ' <div class="caption">';
                                                
                                                        echo ' <div class="rating-item">
                                                            <div class="rating-item-content">
                                                             <a class="rating-title" href="https://www.imdb.com/title/tt7286456/reviews?sort=submissionDate&dir=desc&ratingFilter=10"> IMDb </a>
                                                                  <div ><div class="stareval-stars"><span class="fa fa-star checked"></span></div><span class="stareval-note">' . $films['note_imdb'] . '/5</span></div>
                                                            </div>';
                                                       
                                                            
                                                        echo '<div class="rating-item-content">
                                                             <a class="rating-title" href="/film/fichefilm-268282/critiques/presse/"> AlloCiné </a>
                                                                <div ><div class="stareval-stars"><span class="fa fa-star checked"></span></div><span class="stareval-note">' . $films['note_allocine'] . '/5</span></div>
                                                            </div>
															<br>&nbsp; ';
                                                      
                                            echo '</div>';
                                       
                                              
                                        echo '  </div>
                                      </div>   </div>';
                                         echo ' <div id="myModal1-' . $films['num_film'] . '" class="modal modalinfo">
                                                             <div class="modal-dialog">
                                                               <div class="modal-content">
                                                                      <div class="modal-header"  style="background: #333;height:29px;padding: 0;">';
                                                                           echo ' <div id="modal__title" style="color: #0397D6;font-size: 16px;font-weight: 600;line-height: normal; ">' . $films['title'] . ' </div>';
                                                                            echo '  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                      </div> ';
                                                                        echo '<div style="display: inline-block;padding: 5px 12px;background: #eee;color: #333;font-weight: 700;font-size: 12px;">

                                                                                  <div style=" float: left;padding: 1px 7px;background: #fed500;margin-right: 15px;">IMDb: ' . $films['note_imdb'] . '/5</div>
                                                                                  <div class="jt-info">' . $films['duration'] . '  &nbsp; &nbsp; ' . $films['country'] . '</div><div class="clearfix"></div></div>';
                                            
                                                                 echo '  <div class="mvic-info" > 
                                                                    
                                                                <div class="mvic-desc"> 
                                                                <p> <strong>Synopsis: </strong>' . $films['synopsis'] . '</p></div> ';
                                                               
                                                                echo '  <div class="mvici-left"> 
                                                                <p> <strong>Director:</strong> <a href="#">' . $films['director'] . '</a> </p> ';
                                                                  echo ' <p> <strong>Actor: </strong> <a href="#">' . $films['actors'] . '. </a></p> 
                                                                </div>';
                                                                  echo ' <div class="mvici-right"> 
                                                                    <p> <strong>Genre: </strong>  <a  href="#">' . $films['kind'] . '</a> </p> ';
                                                                     
                                                           echo '       </div> 
                                                                </div>
                                                                </div>
                                                            </div>
                                                         </div>
                                                            <div id="myModal2-' . $films['num_film'] . '" class="modal modalvideo">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      
                                                                  
                                                                              <button type="button" class="close " data-dismiss="modal" aria-hidden="true"><img src="http://cdn3.iconfinder.com/data/icons/iconic-1/32/x_alt-128.png"  width="16" height="16" alt="X" /></button>
                                                                           <iframe width=100% height="400" src="https://www.youtube.com/embed/' . $films['video'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                        </div>
                                                               
                                                                </div>
                                                            </div>
															
														 <div id="myModal3-' . $films['num_film'] . '" class="modal modalinfo">
                                                             <div class="modal-dialog">
                                                               <div class="modal-content">
                                                                      <div class="modal-header"  style="background: #333;height:29px;padding: 0;">
                                                                         <div id="modal__title" style="color: #0397D6;font-size: 16px;font-weight: 600;line-height: normal; ">' . $films['title'] . ' - liste des cinémas</div>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                      </div> 
                                                                        <div style="display: inline-block;padding: 3px 3px;background: #eee;color: #333;font-weight: 700;font-size: 12px; width: 100%;">

                                                                                  <div style=" float: left;background: #fed500; overflow-y: scroll;height:100px; width: 100%;">' . $films['cinemas'] . '</div>
                                                                               </div>
                                            
                                                             
                                                                     
                                                             </div> 
                                                               
                                                            </div>
                                                         </div>
											
															
															
															
                                    </div>';
                                            
                                            
                                }   
                                    $statement->execute();
                                     $data = $statement->fetchAll();
                                       Database::disconnect();
                       
                                    ?>  
                                    

                          </div>
					 </div>
            </div>
          
    
           
                     <footer>
         
                         <div class="footer-social-icons">
                            <ul class="social-icons">
                                <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="" class="social-icon"> <i class="fa fa-rss"></i></a></li>
                                <li><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                              
                            </ul>
                        
                              <span class="copyright">Copyright ©2019. Tous droits réservés.</span>
                             </div>
                        
                   
                </footer>
             
    </body>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
           <script>
            var searchUsers = document.querySelector('#search-users'),
                users = document.querySelectorAll('.thumbnail'),
                usersData = document.querySelectorAll('.user-data'),
                searchVal;

            searchUsers.addEventListener('keydown', function() {
              searchVal = this.value.toLowerCase();

              for (var i = 0; i < users.length; i++) {
                if (!searchVal || usersData[i].textContent.toLowerCase().indexOf(searchVal) > -1) {
                  users[i].style['display'] = 'block';
                 
                }
                else {
                  users[i].style['display'] = 'none';
                }
              }
            });
               
               // not exactly vanilla as there is one lodash function

                    var allCheckboxes = document.querySelectorAll('input[type=checkbox]');
                    var allPlayers = Array.from(document.querySelectorAll('.movie'));
                    var checked = {};

                    getChecked('genres');
               

                    Array.prototype.forEach.call(allCheckboxes, function (el) {
                      el.addEventListener('change', toggleCheckbox);
                    });

                    function toggleCheckbox(e) {
                      getChecked(e.target.name);
                      setVisibility();
                    }

                    function getChecked(name) {
                      checked[name] = Array.from(document.querySelectorAll('input[name=' + name + ']:checked')).map(function (el) {
                        return el.value;
                      });
                    }

                    function setVisibility() {
                      allPlayers.map(function (el) {
                        var genres = checked.genres.length ? _.intersection(Array.from(el.classList), checked.genres).length : true;
                 
                        if (genres ) {
                          el.style.display = 'block';
                        } else {
                          el.style.display = 'none';
                        }
                      });
                    }
               
                //on close remove
                $('.modal').on('hidden.bs.modal', function (e) {
                        $iframe = $(this).find("iframe");
                        $iframe.attr("src", $iframe.attr("src"));
                    });
				$('#form').on('hidden.bs.modal', function (e) {
				  $(this)
					.find("input,textarea,select")
					   .val('')	
					   .end();
					 $('#isSuccess').empty();
					
				});
				
                </script>
    
           
   

</html>