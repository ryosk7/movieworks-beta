<?php
 // session_start();
 // $plid = $_SESSION['plid'];
 //
 // $pdo = new PDO( "mysql:dbname=youtube_db;host=localhost;charset=utf8mb4","root", "");//SQLとDB接続内容
 // if(!$pdo){echo "接続失敗";}//接続確認

 ?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/form.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
  <title>検索＆ギャラリーフォーム</title>
  <style>

  </style>
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

<body>

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

        <section>
        <div class="col-xs-2 col-md-12 header__col global-nav-wrapper clearfix">
          <div class="genruFlex">
          <dl>
            <dt><a href="">ALL</a></dt>
            <dt><a href="">Youtube</a></dt>
            <dt><a href="">PV</a></dt>
            <dt><a href="">企業向け</a></dt>
            <dt><a href="">Other</a></dt>
          </dl>

          <!-- <form class="formstyle" method="post">
           <input type="submit" name="1" value="PV">
           <input type="submit" name="2" value="YOUTUBER">
           <input type="submit" name="3" value="GAME">
           <input type="submit" name="0" value="ALL">
          </form> -->

          <div id="responsive-btn"></div>
          <!-- end .header__col -->
        </div>
        </div>
        </section>

        <main>
          <section>
            <a href="http://localhost/movieworks-beta/gallery-criant.php" class="info-link">
            <h2>Youtube制作承ります</h2>
            <img class="section-img profile" src="https://picsum.photos/g/600/400?image=625" alt="important graph">
            <p>Some Text goes here, some text goes here, some text goes here, some text goes here.</p>
            </a>
          </section>
          <section>
            <a href="http://localhost/movieworks-beta/gallery-criant.php" class="info-link">
            <h2>PV等の映像編集行います！</h2>
            <p>Some Text goes here, some text goes here, some text goes here, some text goes here.</p>
            <img class="section-img" src="https://emojipedia-us.s3.amazonaws.com/thumbs/120/emoji-one/104/chart-with-upwards-trend_1f4c8.png" alt="important graph">
            </a>
          </section>
          <section>
            <h2>The Title</h2>
            <img class="section-img profile" src="http://localhost/movieworks-beta/src/img/icon.png" />
            <p>Some Text goes here, some text goes here, some text goes here, some text goes here.</p>
            <a href="http://localhost/movieworks-beta/gallery-criant.php" class="info-link">Learn more...</a>
          </section>
          <section class="bigbottom">
            <h2>The Title</h2>
            <p>Some Text goes here, some text goes here, some text goes here, some text goes here.</p>
            <a class="bigbottom-link info-link" href="#" class="info-link">Learn more...</a>
          </section>
          <section class="bigtitle">
            <h2 class="bigtitle-title">The Title</h2>
            <p>Some Text goes here, some text goes here, some text goes here, some text goes here.</p>
            <a href="#" class="info-link">Learn more...</a>
          </section>
          <section>
            <h2>The Title</h2>
            <p>Some Text goes here, some text goes here, some text goes here, some text goes here.</p>
            <a href="#" class="info-link">Learn more...</a>
          </section>



        </main>
        <!-- ーーーーーーーーーーーーーーーーーfooterーーーーーーーーーーーーーーーーーーーーーー -->

        <footer>
          <div id="footer" class="footer-content blue_bg">
            <div class="footer-pdd">
              <div class="inner">
                <div class="cf">
                  <div class="left">
                    <a class="logo" href="#"></a>
                    <p>© PHPkenshu all rights reserved.</p>
                  </div><!-- .left -->
                  <div class="right">
                    <ul class="cf">
                      <li><p>SOCIAL</p></li>
                      <li class="facebook sbtn">
                        <a href="#" target="_blank">
                          <div class="sbtn_in">
                            <p class="icon-facebook"></p>
                            <div class="slide reset"><span class="icon-facebook"></span></div>
                          </div>
                        </a>
                      </li>
                      <li class="twitter sbtn">
                        <a href="#" target="_blank">
                          <div class="sbtn_in">
                            <p class="icon-twitter"></p>
                            <div class="slide reset"><span class="icon-twitter"></span></div>
                          </div>
                        </a>
                      </li>
                      <li class="instagram sbtn">
                        <a href="#" target="_blank">
                          <div class="sbtn_in">
                            <p class="icon-instagram"></p>
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
