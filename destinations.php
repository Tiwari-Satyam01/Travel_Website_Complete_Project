<?php include 'includes/session.php'; ?>
<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Canvas Travels | Destinations</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/destinations.css">
  <link rel="stylesheet" href="css/responsive.css">
<style>
</style>
</head>
<body>

<section class="destinations-intro">
  <div class="container">
    <h2>Discover Our Exclusive Destinations</h2>
    <p>Each carefully selected location offers unique experiences tailored to different travel styles and preferences.</p>
  </div>
</section>

<section class="destination-list">
  <div class="container">

    <!-- Italy -->
    <div class="destination-card">
      <div class="destination-image">
        <img src="https://images.unsplash.com/photo-1503917988258-f87a78e3c995?w=1200&auto=format" alt="Italian coastline">
      </div>
      <div class="destination-info">
        <h3>Italy - La Dolce Vita</h3>
        <p class="destination-description">Experience the romance of Italy with our carefully curated packages that take you through the country's most enchanting locations.</p>
        <div class="package-details">
          <div class="package-highlights">
            <h4>Package Highlights</h4>
            <ul>
              <li>Gondola rides through Venetian canals</li>
              <li>Colosseum and Vatican City tours</li>
              <li>Tuscan wine tasting experiences</li>
              <li>Amalfi Coast scenic drives</li>
              <li>Authentic pasta making classes</li>
            </ul>
          </div>
          <div class="travel-info">
            <div class="info-box">
              <h5>Best Time to Visit</h5>
              <p>April-June & September-October</p>
            </div>
            <div class="info-box">
              <h5>Ideal For</h5>
              <p>Couples, Families, Foodies</p>
            </div>
            <div class="info-box">
              <h5>Duration</h5>
              <p>10-14 days</p>
            </div>
          </div>
        </div>
        <div class="action-buttons">
          <a href="https://en.wikipedia.org/wiki/Italy" target="_blank" class="btn learn-btn">Learn More</a>
          <?php if (is_logged_in()): ?>
            <a href="booking.php" class="btn book-btn">Book Now</a>
          <?php endif; ?>
          <a href="index.php#contact" class="btn contact-btn">Inquire</a>
        </div>
      </div>
    </div>

    <!-- Japan -->
    <div class="destination-card">
      <div class="destination-image">
        <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?w=1200&auto=format" alt="Tokyo cityscape">
      </div>
      <div class="destination-info">
        <h3>Japan - Tradition Meets Innovation</h3>
        <p class="destination-description">Japan offers a fascinating blend of ancient traditions and cutting-edge modernity. Our packages provide authentic experiences.</p>
        <div class="package-details">
          <div class="package-highlights">
            <h4>Package Highlights</h4>
            <ul>
              <li>Tokyo's Shibuya crossing and Tsukiji market</li>
              <li>Kyoto's Golden Pavilion and tea ceremonies</li>
              <li>Osaka street food tours</li>
              <li>Hakone hot springs with Mt. Fuji views</li>
              <li>Bullet train experiences</li>
            </ul>
          </div>
          <div class="travel-info">
            <div class="info-box">
              <h5>Best Time to Visit</h5>
              <p>March-May or October-November</p>
            </div>
            <div class="info-box">
              <h5>Ideal For</h5>
              <p>Friends, Culture Enthusiasts, Tech Lovers</p>
            </div>
            <div class="info-box">
              <h5>Duration</h5>
              <p>12-16 days</p>
            </div>
          </div>
        </div>
        <div class="action-buttons">
          <a href="https://en.wikipedia.org/wiki/Japan" target="_blank" class="btn learn-btn">Learn More</a>
          <?php if (is_logged_in()): ?>
            <a href="booking.php" class="btn book-btn">Book Now</a>
          <?php endif; ?>
          <a href="index.php#contact" class="btn contact-btn">Inquire</a>
        </div>
      </div>
    </div>

    <!-- Maldives -->
    <div class="destination-card">
      <div class="destination-image">
        <img src="https://images.unsplash.com/photo-1518391846015-55a9cc003b25?w=1200&auto=format" alt="Maldives overwater bungalow">
      </div>
      <div class="destination-info">
        <h3>Maldives - Tropical Paradise</h3>
        <p class="destination-description">The ultimate luxury beach destination with pristine white sand beaches and crystal-clear waters.</p>
        <div class="package-details">
          <div class="package-highlights">
            <h4>Package Highlights</h4>
            <ul>
              <li>Luxury overwater villas</li>
              <li>Snorkeling with manta rays</li>
              <li>Overwater spa treatments</li>
              <li>Sunset dolphin cruises</li>
              <li>Private sandbank picnics</li>
            </ul>
          </div>
          <div class="travel-info">
            <div class="info-box">
              <h5>Best Time to Visit</h5>
              <p>November-April</p>
            </div>
            <div class="info-box">
              <h5>Ideal For</h5>
              <p>Couples, Luxury Travelers, Divers</p>
            </div>
            <div class="info-box">
              <h5>Duration</h5>
              <p>7-10 days</p>
            </div>
          </div>
        </div>
        <div class="action-buttons">
          <a href="https://en.wikipedia.org/wiki/Maldives" target="_blank" class="btn learn-btn">Learn More</a>
          <?php if (is_logged_in()): ?>
            <a href="booking.php" class="btn book-btn">Book Now</a>
          <?php endif; ?>
          <a href="index.php#contact" class="btn contact-btn">Inquire</a>
        </div>
      </div>
    </div>

    <!-- Switzerland -->
    <div class="destination-card">
      <div class="destination-image">
        <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba" alt="Switzerland mountains">
      </div>
      <div class="destination-info">
        <h3>Switzerland - Alpine Wonderland</h3>
        <p class="destination-description">Switzerland offers world-class skiing, scenic train journeys, and luxury resorts.</p>
        <div class="package-details">
          <div class="package-highlights">
            <h4>Package Highlights</h4>
            <ul>
              <li>Europe's highest railway</li>
              <li>Iconic skiing and mountain peaks</li>
              <li>Alpine luxury resorts</li>
              <li>Glass-dome train journeys</li>
              <li>Historic bridges and boat cruises</li>
            </ul>
          </div>
          <div class="travel-info">
            <div class="info-box">
              <h5>Best Time to Visit</h5>
              <p>Winter: Dec-Mar</p>
              <p>Summer: Jun-Sep</p>
            </div>
            <div class="info-box">
              <h5>Ideal For</h5>
              <p>Friends, Nature Lovers</p>
            </div>
            <div class="info-box">
              <h5>Duration</h5>
              <p>10-12 days</p>
            </div>
          </div>
        </div>
        <div class="action-buttons">
          <a href="https://en.wikipedia.org/wiki/Switzerland" target="_blank" class="btn learn-btn">Learn More</a>
          <?php if (is_logged_in()): ?>
            <a href="booking.php" class="btn book-btn">Book Now</a>
          <?php endif; ?>
          <a href="index.php#contact" class="btn contact-btn">Inquire</a>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="cta-section">
  <div class="container">
    <h3>Customize Your Dream Vacation</h3>
    <p>Our travel specialists can tailor any package to your specific needs and preferences.</p>
    <a href="signup.php" class="btn cta-btn">Start Planning Today</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
