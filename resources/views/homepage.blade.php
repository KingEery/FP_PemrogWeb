<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ITQOM - Homepage</title>

  <!-- Link to CSS -->
  <link rel="stylesheet" href="css1/home.css" />

  <!-- AOS CSS (Animate On Scroll) -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
</head>
<body>

  <header>
    <a href="#" class="logo">
      <img src="image/logo.png" alt="Logo" />
    </a>

    <ul class="nav-links">
      <li><a href="#home" class="active">Home</a></li>
      <li><a href="#class">Class</a></li>
      <li><a href="#mentoring">Mentoring</a></li>
      <li><a href="#event">Event</a></li>
    </ul>
   

    <div class="auth-buttons">
      <button class="login">Login</button>
      <button class="signup">Sign Up</button>
    </div>
  </header>
<!-- page 1 -->
  <section class="homepage" id="home" data-aos="fade-up">
    <div class="homepage-text">
      <h1>Develop your skills in a new and unique way</h1>
      <p>Discover the best coding course for your kids. Learn Coding from basic</p>
    </div>
    <div class = "homepage-img">
    <img class = "homepage-img" src="image/homepsge-img.png "alt="">
    </div>
  </section>
<!-- page 2 -->
  <section class="page2" id="page2" data-aos="fade-up">
    <div class="head">
      <span>Telah dipercaya oleh :</span>
   </div>
  </section>

  <!-- page 3 -->
  


  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

</body>
</html>
