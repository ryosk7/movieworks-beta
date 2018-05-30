<?php
 // echo "まっちんぐ♡";
 session_start();
 $plid = $_SESSION['plid'];
 $pdo = new PDO( "mysql:dbname=youtube_db;host=localhost;charset=utf8mb4","root", "");
 if(!$pdo){echo "接続失敗";}
 // echo "<br>";
 // echo $plid;
 // echo "<br>";
 if (isset($_POST['request'])) {
   // echo "Hello World";
   $client = $pdo -> prepare  ("INSERT INTO client(name, picture, mvid, email)values(?,?,?,?)");
   $client -> bindParam("name",$name);
   $client -> bindParam("picture",$picture);
   $client -> bindParam("plid",$uploadsListId);
   $client -> bindParam("email",$email);

   $client -> execute(array($name,$picture,$uploadsListId,$email));

   if(!$user){echo "ERROR";}
 }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="src/css/gallery-criant.css">
   <link rel="stylesheet" href="src/css/style.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <title>クライアント申請画面</title>
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
           <li><a href=""  onclick="nav_close()">push</a></li>
         </ul>

       </div>
       <div id="nav">
         <div class="nav_cont">

             <div class="home_btn">
               <a href="index.html"><img src="src/img/MW_Logo.png" alt="" class="movieworks_logo"></a>
             </div>

           <ul>
             <li><a href="#"><img src="src/img/home.png" alt="" class="header_icon"><p>home</p></a></li>
             <li><a href="#"><img src="src/img/prof.png" alt="" class="header_icon"><p>profile</p></a></li>
             <li><a href="#"><img src="src/img/serch.png" alt="" class="header_icon"><p>gallery</p></a></li>
             <li><a href="#"><img src="src/img/note.png" alt="" class="header_icon"><p>push</p></a></li>
           </ul>
           <a id="menu_btn" href="javascript:void(0)" onclick="nav_open()" class="nav_menu_btn">&Congruent;
           </a>
         </div>
       </div>
     </header>
     <body>

       <div class="wrapper">
         <section class="mainContent">
           <div class="prof-all">
           <div class="prof-body">
             <h3 class="prof-title">このユーザーにマッチング申請を送りました。</h3>

             <div class="prof-icon">
               <img src=src/img/icon.png style="margin-top:100px;" alt="">
               <h3 class="prof-title">うちだりょうすけ</h3>

             </div>
               <input type="button"  style="margin-top:100px;" id="form_submit_button" value="  ギャラリーに戻る  " />

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

     </body>
     </html>
