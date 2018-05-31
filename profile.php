
   <?php session_start(); ?>

   <!DOCTYPE html>
   <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="src/css/profile.css">
     <link rel="stylesheet" href="src/css/style.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
     <title>プロフィール画面</title>
   </head>

   <script>
   $(document).on('scroll',function(){

     if ($(document).scrollTop() > 30) {
       $('#nav').addClass('fixed');
       $('home_btn').addClass('fixed');
     } else {
       $('#nav').removeClass('fixed');
       $('home_btn').removeClass('fixed');
     }

   });
   </script>
   <script>
   function goto_level2() {
     $(document).ready(function(){
       var divLoc = $('#top').offset();
       $('html, body').animate({scrollTop: divLoc.top}, "slow");
     });
   }
   function goto_level3() {
     $(document).ready(function(){
       var divLoc = $('#section-target').offset();
       $('html, body').animate({scrollTop: divLoc.top}, "slow");
     });
   }
   function goto_level4() {
     $(document).ready(function(){
       var divLoc = $('#workSection').offset();
       $('html, body').animate({scrollTop: divLoc.top}, "slow");
     });
   }
   function goto_level5() {
     $(document).ready(function(){
       var divLoc = $('#level5').offset();
       $('html, body').animate({scrollTop: divLoc.top}, "slow");
     });
   }




   function nav_open() {
     document.getElementsByClassName("nav_sp")[0].style.width = "100%";
     document.getElementsByClassName("nav_sp")[0].style.textAlign = "center";
     document.getElementsByClassName("nav_sp")[0].style.fontSize = "50px";
     document.getElementsByClassName("nav_sp")[0].style.paddingTop = "10%";
     document.getElementsByClassName("nav_sp")[0].style.display = "block";
     document.getElementsByClassName("nav_menu_btn")[0].setAttribute( "onClick", "javascript: nav_close();" );
     document.getElementsByClassName("nav_menu_btn")[0].style.color = "#fb4995";
   }
   function nav_close() {
     document.getElementsByClassName("nav_sp")[0].style.display = "none";
     document.getElementsByClassName("nav_menu_btn")[0].setAttribute( "onClick", "javascript: nav_open();" );
     document.getElementsByClassName("nav_menu_btn")[0].style.color = "#3f3f3f";
   }

   </script>
   <script>
   $(function() {
     $("a[href*='#']:not([href='#'])").click(function() {
       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
           $('html,body').animate({
             scrollTop: target.offset().top
           }, 1000);
           return false;
         }
       }
     });

   })
   </script>

   </head>


   <section id="top">
     <header class="Header l-column blue_bg">
       <!-- <span class="fa fa-bars"></span> -->
       <div class="Header__head">
         <div class="nav_sp" style="display: none;">
           <ul class="Menu">
             <li><a href="#top"  onclick="nav_close()">home</a></li>
             <li><a href="#section-target"  onclick="nav_close()">profile</a></li>
             <li><a href="#workSection"  onclick="nav_close()">gallery</a></li>
             <li><a href=""  onclick="nav_close()">list</a></li>
             <li><a href=""  onclick="nav_close()">push</a></li>


           </ul>

         </div>
         <div id="nav">
           <div class="nav_cont">

               <div class="home_btn">
                 <a href="http://localhost/movieworks-beta/MW_TopPage/MW_TopPage/index.php"><img src="src/img/MW_Logo.png" alt="" class="movieworks_logo"></a>
               </div>

             <ul>
               <li><a href=""><img src="src/img/home.png" alt="" class="header_icon"><p>home</p></a></li>
               <li><a href="http://localhost/movieworks-beta/profile.php?mode=success&code=4/AAAJutV5MmO-buUKa-tLYzMI2E35K8cPCFDF2hO6D2PaHgP0fZXTXpEbkUdZvHCFua4KsOmKxEWPk-5l0mYDJd0#"><img src="src/img/prof.png" alt="" class="header_icon"><p>profile</p></a></li>
               <li><a href="http://localhost/movieworks-beta/gallaryform.php"><img src="src/img/serch.png" alt="" class="header_icon"><p>gallery</p></a></li>
               <li><a href="http://localhost/movieworks-beta/list.php"><img src="src/img/human.png" alt="" class="header_icon"><p>list</p></a></li>
               <li><a href="http://localhost/movieworks-beta/touko.php"><img src="src/img/note.png" alt="" class="header_icon"><p>push</p></a></li>

             </ul>
             <a id="menu_btn" href="javascript:void(0)" onclick="nav_open()" class="nav_menu_btn">&Congruent;
             </a>
           </div>
         </div>
       </header>
       <body>

         <div class="wrapper">
           <section class="mainContent">


             <?php
             require_once 'vendor/autoload.php';
             $self = "http://{$_SERVER['HTTP_HOST']}/movieworks-beta/profile.php";
             $success = "$self?mode=success";
             $secretsJson = 'client_secret.json';
             $p = $_GET;
             $mode = @$p['mode'];
             $client = new Google_Client();
             $_SESSION['client'] = $client;
             $client->setAuthConfig($secretsJson);
             $client->setScopes("https://www.googleapis.com/auth/plus.profile.emails.read");
             $client->addScope('https://www.googleapis.com/auth/youtube');
             $client->addScope(Google_Service_Plus::USERINFO_PROFILE);
             $client->setAccessType('offline');
             $client->setApprovalPrompt('force');
             $client->setRedirectUri($success);
             $authUrl = $client->createAuthUrl();
             echo "<h3><a href='$authUrl'>Auth</a></h3>";
             echo "<a href='gallaryForm.php'>gallary</a>";
             echo "<pre>";


             $count=0;

             $pdo = new PDO( "mysql:dbname=youtube_db;host=localhost;charset=utf8mb4","root", "");
             if(!$pdo){echo "接続失敗";}

             if ($mode == 'clear') {
              $_SESSION['accessToken'] = '';
             }
             elseif ($mode == 'success') {
              // echo "<p>SUCCESS: {$p['code']}</p>";
              $client->authenticate($p['code']);
              $accessToken = $client->getAccessToken();
              if ($accessToken) { $_SESSION['accessToken'] = $accessToken; }
             }
             if (@$_SESSION['accessToken']) {
              // アクセストークンを出力
              // var_export($_SESSION['accessToken']);
              $client->setAccessToken($_SESSION['accessToken']);
              $plus = new Google_Service_Plus($client);
              $me = $plus->people->get('me');
              // echo "<p><img src='{$me['image']['url']}'></p>";
              // echo "<p>NAME: {$me['displayName']}</p>";
              // echo "<p>MAIL: {$me->emails[0]->value}</p>";
              // echo "<p>GENDER: {$me['gender']}</p>";
              // echo "<p>URL: {$me['url']}</p>";
              $name = $me['displayName'];
              $picture = $me['image']['url'];
              $email = $me->emails[0]->value;

             }
             // echo $name."<br>";
             // echo $picture."<br>";

             echo "</pre>";
             $youtube = new Google_Service_YouTube($client);
             if (isset($_SESSION['accessToken'])) {
               $client->setAccessToken($_SESSION['accessToken']);
             }
             // Check to ensure that the access token was successfully acquired.





                ?>



             <?php
             if ($client->getAccessToken()) {
              echo <<< AFTER

              <div class="prof-all">
              <div class="prof-body">
                <div class="prof-icon">
                  <img src="$picture" alt="">
                  <h1>
                      $name
                  </h1>
                </div>

                <div class="prof-text">


                  <h4 style="">

                  <span>Yours Movies</span>
                  </h4>





AFTER;
            }
              ?>


                   <?php
                     if ($client->getAccessToken()) {
                       try {
                         // Call the channels.list method to retrieve information about the
                         // currently authenticated user's channel.
                         $channelsResponse = $youtube->channels->listChannels('contentDetails', array(
                           'mine' => 'true',
                         ));
                         $htmlBody = '';
                         $count=0;
                         $res_con=0;
                     foreach ($channelsResponse['items'] as $channel) {
                       // Extract the unique playlist ID that identifies the list of videos
                       // uploaded to the channel, and then call the playlistItems.list method
                       // to retrieve that list.
                       $uploadsListId = $channel['contentDetails']['relatedPlaylists']['uploads'];
                       $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet', array(
                         'playlistId' => $uploadsListId,
                         'maxResults' => 6
                       ));
                       $_SESSION['plid'] = $uploadsListId;
                       echo '<div class="prof-movie">';
                       foreach ($playlistItemsResponse['items'] as $playlistItem) {
                        $htmlBody .= sprintf('
                        <div style="width:251px; height:420px; float:left; margin:20px;">
                        <form method="post">ジャンル選んでね<br>
                        PV<input type="radio" name="tag" value=1>
                        YOUTUBER<input type="radio" name="tag" value=2>
                        GAME<input type="radio" name="tag" value=3>
                        <input type="submit" name=send%s value="登録"><br>
                        %s
                        </form>', $count,"<br>" ,
                          $playlistItem['snippet']['resourceId']['videoId']);
                        $htmlBody .= sprintf('<iframe width="250" height="250"
                                  src="https://www.youtube.com/embed/%s"
                                  frameborder="0" allowfullscreen></iframe></div>',
                                  $playlistItem['snippet']['resourceId']['videoId']);
                        $mvid[$count]=$playlistItem['snippet']['resourceId']['videoId'];
                        $count=$count+1;
                      }

                      echo $htmlBody;

                     }
                     echo "</div>";
                   }
                   catch (Google_Service_Exception $e) {
                     $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
                       htmlspecialchars($e->getMessage()));
                   } catch (Google_Exception $e) {
                     $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
                       htmlspecialchars($e->getMessage()));
                   }
                   $_SESSION['accessToken'] = $client->getAccessToken();
                 }

                   for($i=0; $i<=$count; $i++){
                     $a="send";
                     $b=$a.$i;
                     if(isset($_POST[$b])){
                       if(isset($_POST["tag"])){
                       $mvid=$mvid[$i];
                       $tag=$_POST["tag"];



                           $sent = $pdo -> prepare("INSERT INTO movie(plid , mvid , tag)values(?,?,?)");

                             $sent -> bindParam("plid",$uploadsListId);
                             $sent -> bindParam("mvid",$mvid);
                             $sent -> bindParam("tag",$tag);

                           $sent -> execute(array($uploadsListId,$mvid,$tag));

                           if(!$sent){echo "ERROR";}
                           else{echo "登録完了";}
                       }else{echo "タグ付けなし！";}
                     }
                     // else{echo "error";}
                   } // forの終わり

                    ?>

              <?php
              if ($client->getAccessToken()) {

               echo <<< AFTER

               <div class="prof_prof">


               <h3 class="prof-title">Profile</h3>
               <form action="" method="post" id="mail_form">
                 <table>
                   <tr >

                   <th>mail</th>
                   <td class="required">
                      {echo $email;}
                   </td>
                   </tr>
                   <th>area</th>
                   <td class="required">
                     大日本帝国
                   </td>
                   </tr>
                   <tr>
                     <th>profile</th>
                     <td class="required"><textarea id="mail_contents" name="mail_contents" cols="40" rows="10"></textarea></td>
                   </tr>
                   <tr >
                     <td colspan="2">
                     <input type="button" id="form_submit_button" value="  UPDATE  " />
                     </td>
                   </tr>
                 </table>
               </form>
               </div>



AFTER;
}

               ?>


               </div>

             </div>
             </div>
           </section>
         </div>



         <!-- ーーーーーーーーーーーーーーーーーfooterーーーーーーーーーーーーーーーーーーーーーー -->
         <footer>
           <div id="footer" class="footer-content blue_bg">
             <div class="footer-pdd">
               <div class="inner">
                 <div class="cf">
                   <div class="left">
                     <a class="logo" href="#"><img src="src/img/MW_Logo.png" alt=""></a>
                     <p>© PHPkenshu all rights reserved.</p>
                   </div><!-- .left -->
                   <div class="right">
                     <ul class="cf">
                       <li><p>SOCIAL</p></li>
                       <li class="facebook sbtn">
                         <a href="#" target="_blank">
                           <div class="sbtn_in">
                             <!-- <p class="icon-facebook"> -->
                               <img src="src/img/icon_face.png" alt="">
                              <!-- </p> -->
                             <div class="slide reset"><span class="icon-facebook"></span></div>
                           </div>
                         </a>
                       </li>
                       <li class="twitter sbtn">
                         <a href="#" target="_blank">
                           <div class="sbtn_in">
                             <!-- <p class="icon-twitter"></p> -->
                             <img src="src/img/icon_twitter.png" alt="">
                             <div class="slide reset"><span class="icon-twitter"></span></div>
                           </div>
                         </a>
                       </li>
                       <li class="instagram sbtn">
                         <a href="#" target="_blank">
                           <div class="sbtn_in">
                             <!-- <p class="icon-instagram"></p> -->
                             <img src="src/img/icon_insta.png" alt="">
                             <div class="slide reset"><span class="icon-instagram"></span></div>
                           </div>
                         </a>
                       </li>
                     </ul>
                   </div><!-- .right -->
                 </div>
               </div><!-- .inner -->
             </div><!-- .pdd95 -->
           </div><!-- #footer -->
         </footer>
         <?php
         $user = $pdo -> prepare  ("INSERT INTO user(name, picture, plid, email)values(?,?,?,?)");
         $user -> bindParam("name",$name);
         $user -> bindParam("picture",$picture);
         $user -> bindParam("plid",$uploadsListId);
         $user -> bindParam("email",$email);

         $user -> execute(array($name,$picture,$uploadsListId,$email));

         if(!$user){echo "ERROR";}
         // else{echo "登録完了しました<br>";}
          ?>
       </body>
       </html>
