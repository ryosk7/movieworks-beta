<?php
$pdo = new PDO( "mysql:dbname=youtube_db;host=localhost;charset=utf8mb4","root", "");//SQLとDB接続内容
if(!$pdo){echo "接続失敗";}//接続確認
$list = $pdo->prepare("SELECT * from client");
$list -> execute();

if(!$list){echo "ERROR";}
else{
  while($data=$list->fetch()){
    // echo "<p>---------------------------------</p>";
    $name = $data["name"];
    // echo "<br>";
    $email = $data["email"];
    $picture = $data["picture"];
  }//while終了
}//else終了
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="src/css/list.css">
   <link rel="stylesheet" href="src/css/style.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <title>申請リスト</title>
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
               <h3 class="prof-title">以下のリクエストが来ています。</h3>

               <?php
               if(!$list){echo "ERROR";}
               else{
                 while($data=$list->fetch()){
                   <div class="box2">
                   echo $data["name"];
                   echo "<img src="{$data['picture']}" style='width:150px;margin-top:30px;margin-right:440px;' alt="">";
                   echo "<h2 style='margin-top:-180px'>{$data['name']}</h2>";
                   echo "<p  style='margin-left:260px;'>{$data['email']}</p>";
                   echo "<input type='submit' style='margin-top:40px;margin-right:40px;'value='認証する'>";
                   </div>
                 }//while終了
               }//else終了
                ?>

               <!-- <div class="box2">
                 <img src="src/img/icon.png" style="width:150px;margin-top:30px;margin-right:440px;" alt="">
                 <h2 style="margin-top:-180px">おりたゆきお</h2>
                 <p  style="margin-left:260px;">はじめまして。よろしくお願いします。</p>
                 <input type="submit" style="margin-top:40px;margin-right:40px;"value="認証する">
               </div>
               <div class="box2">
                 <img src="src/img/icon.png" style="width:150px;margin-top:30px;margin-right:440px;" alt="">
                 <h2 style="margin-top:-180px">かんざきまゆ</h2>
                 <p  style="margin-left:260px;">はじめまして。よろしくお願いします。</p>
                 <input type="submit" style="margin-top:40px;margin-right:40px;"value="認証する"> -->

               <!-- </div>
               <div class="box2">
                 <img src="src/img/icon.png" style="width:150px;margin-top:30px;margin-right:440px;" alt="">
                 <h2 style="margin-top:-180px">折田幸夫</h2>
                 <p  style="margin-left:260px;">はじめまして。よろしくお願いします。</p>
                 <input type="submit" style="margin-top:40px;margin-right:40px;"value="認証する"> -->

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

     </body>
     </html>
