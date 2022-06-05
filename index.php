<!DOCTYPE HTML>
<html>
    <head>
        <title> EZ-College</title>
        <link rel=stylesheet href="css/styles.css" type="text/css" />
        <?php
            include "navbar.php";
        ?>
        <!--BOOTSTRAP STYLESHEET-->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->

    </head>
    <body>
        <br><br><br>
        
        <!-- Slideshow container -->
        <div class="slideshow-container">

          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="img/college1.jpg" style="width:100%">
            <div class="text">The College Campus</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="img/college2.jpg" style="width:100%">
            <div class="text">The Library</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img/college3.jpg" style="width:100%">
            <div class="text">College Campus</div>
          </div>

          <!-- Next and previous buttons -->
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
        </script>
        
        <!-----------------End of Slideshow ---------------->
        
        <div class="box">
            <h3>Announcements</h3>
            <li>Classes for First Year Students commence from 15-Sep. The details of the same will be communicated through E-Mail. Do check regularly to keep yourself informed.</li>
            <br>
            <li>Admissions are closed for all programmes. Please beware of fraudlent websites giving fake websites</li>
            <br>
            <li>All information posted on this website is the only genuine source, please do not believe any other sources</li>
            <br>
            <li>Results of Final Year students are posted in the stuent login. </li>
            <br>
            <li>Convocation Details will be communicated soon after publication of results.</li>
            <br>
        </div>
    </body>
</html>