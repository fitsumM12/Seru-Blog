<?php include "includes/header.php" ?>
<?php include "includes/db.php"?>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/java.png" alt="java" width="55%" height="30%">
        <title style="background-color:black; color:white; ">Welcome To Our Site</title>
      </div>

      <div class="item">
        <img src="images/c-programming-language.jpg" alt="c-programming-languag"  width="55%" height="30%">
      </div>
    
      <div class="item">
        <img src="images/c++.jpg" alt="c++"  width="55%" height="30%">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
