<?php 
  session_start(); 
  require("config/header.php");
?>
    
    <link rel="stylesheet" href="./css/style-header.css">
    <link rel="stylesheet" href="./css/index-content.css">
    <link rel="stylesheet" href="./css/style-footer.css">
    
    <title>Trang chủ</title>
  </head>
  <body>

    <!-- ======================== Header ======================== -->
    
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #181412; height: 90px; font-family: 'Helvetica', sans-serif;">
    
      <a class="navbar-brand mr-4 ml-3" href="#">
        <img src="./image/logo.png"  alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div>
        <form class="form-inline my-2 my-lg-0 " action="index.php" method="post">
          <input class="form-control mr-sm-2" type="search" placeholder="Tìm" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
        name="ok">Tìm kiếm</button>
        </form>

        <ul>
          <li>
            <a href="#">Kết qua tim kiếm</a>
          </li>
        </ul>
      </div>
      

    
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Image and text -->
        <nav class="navbar navbar-dark" style="background-color: #181412;">

          <div class="navbar-brand ml-4 mr-3" style="" href="#">
            <span class="" style=" color: #9befe0; position: relative;top: 2px;">
              <i class="fas fa-circle"></i>
            </span>
            
              <a class="btn btn-secondary dropdown-toggle abc" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Thể loại
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Pop</a>
                <a class="dropdown-item" href="#">HipHop</a>
                <a class="dropdown-item" href="#">Rock</a>
                <a class="dropdown-item" href="#">Balad</a>
              </div>
            
          </div>

          <a class="navbar-brand mx-4" href="#">
            <span class="mr-3" style=" color: #fae639;">
              <i class="fas fa-circle "></i>
            </span>
            Bài hát
          </a>
          
          <?php 
            if(isset($_SESSION["taikhoan"]))
            {
                echo"<a class='navbar-brand mx-4' href='./mylist.php'>";
                  echo"<span class='mr-3' style=' color: #f573a0;'>";
                    echo"<i class='fas fa-circle'>"; 
                    echo"</i>";
                  echo"</span>";
                  echo "MyList";
                echo"</a>";
              echo "</nav>";
              echo "</div>";

              echo "<div class='info-user'>";
                echo"<a href='#'>";  
                  echo "Xin Chào ".$_SESSION["taikhoan"]." <a href='logout.php'>Đăng xuất</a>";
                echo"</a>";
              echo "</div>";
            }
            else
            {             
              echo"<a class='navbar-brand mx-4' href='./login.php'>";
                echo"<span class='mr-3' style=' color: #f573a0;'>";
                  echo"<i class='fas fa-circle'>"; 
                  echo"</i>";
                echo"</span>";
                echo "Đăng nhập";
              echo"</a>";
              echo "</nav>";
              echo "</div>";
            }      
          ?>
  </nav>

  <!-- ======================== Content ======================== -->
  <div class="body">
    <div style="background: rgb(0,0,0);background: linear-gradient(90deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 0%);width: 100%;height: 100%;">
    <div style="height: 20px; width: 100%"></div>    
      <div class="container text-center">
      
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" style=" height: 350px;">
            <div class="carousel-item active">
              <img class="d-block w-100" src="./image/slider.jpg" border="0"  alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./image/slider.jpg" border="0"  alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./image/slider.jpg" border="0"  alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <div class="row text-left mt-4">
          <div class="col-sm-9">
          <div class="d-flex">
            <a href="#" style="font-size: 1.7em; color: #FFF;font-weight: bold;margin-right: 10px;">Ablum</a>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb" style="background-color: transparent;font-weight: bold;">
                <li class="breadcrumb-item"><a href="#">Nghe nhiều</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Mới nhất</a></li>
              </ol>
            </nav>
          </div>
          <div class="content">
            
            <?php         
            //Mở kết nối với CSDL
            require("config/connect.php");
            //Thực hiện truy vấn
            $sql = "SELECT * FROM baihat WHERE moi = 1";
            $kq = mysqli_query($conn,$sql);
                      
            while ($data = mysqli_fetch_assoc($kq)) 
            {           
              echo"<div class='box'>";
                echo"<div class='avatar'>";
                  echo"<div class='overload'>";
                    echo"<a href='mylist.php'><img src='$data[img]' alt=''></a>";
                    echo"<span><i class=' fab fa-google-play fa-2x'></i></span>";
                  echo"</div>";
                echo"</div>";
                echo"<div class='name'>$data[tenbh]</div>";
                  echo"<div class='singer'>$data[tencs]</div>";                
              echo"</div>";
            }
            mysqli_close($conn);
          ?>
            
          </div>

          <div class="mb-3 mt-2">
            <a href="#" style="font-size: 1.7em; color: #FFF;font-weight: bold;">The Best</a>
          </div>
         
            
            <div class="row">
              <?php  
                //Mở kết nối với CSDL
                require("config/connect.php");
                //Thực hiện truy vấn
                $sql = "SELECT * FROM baihat WHERE haynhat = 2";
                $kq = mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($kq);
              ?>
              <div class="col-sm-5">
                <div class="box">
                  <div class="avatar">
                    <div class="overload">
                      <img src="<?php echo $data['img']; ?>" alt="" style="width: 326px; height: 307px;">
                      <span><i class=" fab fa-google-play fa-2x"></i></span>
                    </div>
                  </div>
                  <div class="name">The Best Of All</div>                
                </div>
              </div>
              <?php 
                mysqli_close($conn);
              ?>

              <div class="col-sm-7">
                <div class="content">
                  <?php  
                    require("config/connect.php");
            
                    $sql = "SELECT * FROM baihat WHERE haynhat = 1";
                    $kq = mysqli_query($conn,$sql);
                              
                    while ($data = mysqli_fetch_assoc($kq))
                    {
                      echo"<div class='box'>";
                        echo"<div class='avatar'>";
                          echo"<div class='overload'>";
                            echo"<a href='mylist.php'><img src='$data[img]' style='width: 140px;height: 130px;'></a>";
                            echo"<span><i class=' fab fa-google-play fa-2x'></i></span>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='name'>The Best Of</div>";            
                      echo"</div>";
                    }
                    mysqli_close($conn);
                  ?>
                  

                 
               
                </div>
              </div>                
            </div>           
          </div>

          <div class="col-sm-3 mb-3" style="">
            <div class="mb-2">
              <a href="#" style="font-size: 1.7em; color: #FFF;font-weight: bold;">BXH Bài hát</a>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-1" style="background-color: transparent;font-weight: bold;padding: 0px;">
                <li class="breadcrumb-item"><a href="#">Việt Nam</a></li>
                <li class="breadcrumb-item"><a href="#">Âu Mỹ</a></li>
                <li class="breadcrumb-item"><a href="#">Hàn Quốc</a></li>
              </ol>
            </nav>
            
            <?php  
              require("config/connect.php");
            
              $sql = "SELECT topten, tenbh, tencs FROM baihat WHERE topten >0 AND topten <11 ORDER BY topten";
              $kq = mysqli_query($conn,$sql);
              while ($data = mysqli_fetch_assoc($kq))
              {
                echo"<div class='bai-hat-tuan'>";
                  echo"<div class='number'>$data[topten]</div>";
                  echo"<div class='info'>";
                    echo"<div class='title'><a id='id-name' href='#'>$data[tenbh]</a></div>";
                    echo"<div class='singer mb-2'><a id='id-singer' href='#'>$data[tencs]</a></div>";
                  echo"</div>";
                echo"</div>";
              }
              mysqli_close($conn);
            ?>
           

          </div> 

        </div>

    </div>
  </div>
  </div>


  <!-- ======================== Footer ======================== -->
  
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #181412;font-family: 'Helvetica',sans-serif; height: 40px;">
    
      <a class="navbar-brand ml-5" style="color: #fff; opacity: .4; font-size: .8em;" href="">
        Copyright 2018 Personal NP
      </a>
      

      <div class="collapse navbar-collapse footer-left " id="navbarSupportedContent">
        <!-- Image and text -->
        <nav class="navbar navbar-dark" style="background-color: #181412; height: 40px; margin-left: 66%;">
          <a class="navbar-brand mx-4" style="font-size: .9em;" href="#">            
            Get Personal
          </a>
          <a class="navbar-brand mx-4" style="font-size: .9em;" href="#">            
            Legal
          </a>
          <a class="navbar-brand mx-4" style="font-size: .9em;" href="#">            
            Cookies
          </a>
        </nav>     
      </div> 

  </nav>  
  
  <div class="go-home fixed-bottom" style="bottom: 1rem; left: 94%;">
    <a href="./index.php"><i class="fas fa-home fa-3x " style="color: #3ea24c;"></i></a>
  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    
    
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
  </body>
</html>