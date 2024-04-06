<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/offers.css" />
  <title>Travel Offers</title>
</head>
<body>
    <li><a href="index.php">Home</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="login.php">Login</a></li> 

<div class="container">
  <h1 class="header">Travel Offers</h1>

  <div class="offers-container">
    <div class="manila offer">
      <h2>Manila</h2>
      <img src="./assets/images/manila.jpg" alt="Manila Bay or Baywalk">
      <p>In line with the Manila Ocean Park and the US embassy, is the Manila Bay, usually called as Baywalk, too. Perfect venue to chill and watch the ships, yachts and the sunset.</p>

      <button class="book-now" data-destination="Manila">Book Now</button>
    </div>

    <div class="boracay offer">
      <h2>Boracay</h2>
      <img src="./assets/images/boracay.jpg" alt="Boracay">
      <p>Boracay is a small island in the Philippines located approximately 315 km south of Manila and 2 km off the northwest tip of Panay Island in the Western Visayas region of the Philippines.</p>
      
      <button class="book-now" data-destination="Boracay">Book Now</button>
    </div>

    <div class="Cebu offer">
      <h2>Cebu: Moalboal Sardine Run and Turtle Snorkeling Adventure</h2>
      <img src="./assets/images/cebu.jpg" alt="Boracay">
      <p>Witness thousands of fish swimming together, see the sardine run in Moalboal, Spot sea turtles and colorful on a snorkeling adventure from Cebu. Swim in a tropical paradise at Mantayupan Falls.</p>
     
      <button class="book-now" data-destination="Cebu">Book Now</button>
    </div>

    <div class="Davao offer">
      <h2>Davao</h2>
      <img src="./assets/images/davao.jpg" alt="Boracay">
      <p>It was during Davao Food Appreciation Tour in 2012 when I had a chance to visit Kapatagan Valley along with fellow travel and food bloggers from different parts of the country. For the curious travelers, this highland is a popular adventurous destination located at the foot of Mount Apo in Davao Del Sur.</p>

      <button class="book-now" data-destination="Davao">Book Now</button>
    </div>

    <div class="Tacloban offer">
      <h2>Tacloban</h2>
      <img src="./assets/images/tacloban.jpg" alt="Boracay">
      <p>Leyte, Philippines MacArthur Leyte Landing Memorial.</p>

      <button class="book-now" data-destination="Tacloban">Book Now</button>
    </div>

    <div class="Iloilo offer">
      <h2>Iloilo</h2>
      <img src="./assets/images/iloilo.jpg" alt="Boracay">
      <p>Molo Church in Molo, Iloilo City, Philippines.</p>

      <button class="book-now" data-destination="Iloilo">Book Now</button>
    </div>

    <div class="Angeles offer">
      <h2>Angeles</h2>
      <img src="./assets/images/angeles.jpg" alt="Boracay">
      <p>Discover the enchanting oasis of Hidden Valley Springs, a true haven nestled in the heart of the Philippine countryside.</p>

      <button class="book-now" data-destination="Angeles">Book Now</button>
    </div>

    <div class="Bacolod offer">
      <h2>Bacolod</h2>
      <img src="./assets/images/bacolod.jpg" alt="Boracay">
      <p>The Ruins Bacolod is definitely one of the highlights of the city, come day or night. Here’s all you need to know for visiting the dream wedding spot.</p>

      <button class="book-now" data-destination="Bacolod">Book Now</button>
    </div>

    <div class="Cagayan de oro offer">
      <h2>Cagayan de oro</h2>
      <img src="./assets/images/cdo.jpg" alt="Boracay">
      <p>Cagayan de oro tourist spots: Where Adventure Explodes & Beauty Captivates.</p>

      <button class="book-now" data-destination="Cagayan de oro">Book Now</button>
    </div>

    <div class="Tagbilaran offer">
      <h2>Tagbilaran</h2>
      <img src="./assets/images/boracay.jpg" alt="Boracay">
      <p>Boracay is a small island in the Philippines located approximately 315 km south of Manila and 2 km off the northwest tip of Panay Island in the Western Visayas region of the Philippines.</p>

      <button class="book-now" data-destination="Tagbilaran">Book Now</button>
    </div>

    <div class="Kalibo offer">
      <h2>Kalibo</h2>
      <img src="./assets/images/kalibo.jpeg" alt="Boracay">
      <p>Bakhawan Eco Park. Kalibo, Akwan, Philippines.</p>

      <button class="book-now" data-destination="Kalibo">Book Now</button>
    </div>
  </div>
</div>
<script>
  const bookNowButtons = document.querySelectorAll('.book-now');
  bookNowButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Retrieve the data-destination attribute value
      const destination = this.getAttribute('data-destination');
      window.location.href = `dashboard.php?destination=${destination}`;
    });
  });
</script>
</body>
</html>
