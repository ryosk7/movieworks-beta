<?php
session_start();
for($i=0; $i<=100; $i++){
 $j="request".$i;
 $k="plid".$i;
 if(isset($_POST[$j])){
   $plid = $_SESSION[$k];
   break;
 }
}

 $pdo = new PDO( "mysql:dbname=youtube_db;host=localhost;charset=utf8mb4","root", "");//SQLとDB接続内容
   if(!$pdo){echo "接続失敗";}//接続確認

   $list = $pdo -> prepare("SELECT * FROM user WHERE PLID LIKE '{$plid}'");
   $list -> execute();


  ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="src/css/gallary-criant.css">
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

      <?php
      if(!$list){
        echo "ERROR";
      }else{
        $num = $list -> rowCount();
      }
        if($num == 0){
          echo "ユーザーが存在しません";
          exit;
      }else{
        while($data=$list->fetch()){
          $re_name = $data["name"];
          $_SESSION['cl_name'] = $re_name;
          // echo "<br>";
          $re_pic = $data["picture"];
          $_SESSION['cl_pic'] = $re_pic;
          // echo "<br>";
          $re_email = $data["email"];
          $_SESSION['cl_email'] = $re_email;
          // echo "<br>";
        }//while終了
      }
       ?>

      <div class="wrapper">
        <section class="mainContent">
          <div class="prof-all">
          <div class="prof-body">
            <!-- <h3 class="prof-title">動画のタイトル</h3> -->

            <!-- <div class="prof-movie">
              <iframe width="250" height="250" src="//www.youtube.com/embed/d6SSnbVCmEg" frameborder="0" allowfullscreen></iframe>
            </div> -->

            <div class="prof-icon">
              <img src="<?php echo $re_pic; ?>" alt="">
              <h3 class="prof-title"><?php echo $re_name; ?></h3>

            </div>

            <form method='post' action='gallary-client-sinsei.php'><input type='submit' name='request{' value='この人にマッチング申請を送る'></form>
            <form method='post' action='gallaryForm.php'><input type='submit' name='request' value='ギャラリーに戻る'></form>

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
