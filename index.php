<?php include 'includes/db.php'; include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas travels | Home</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/responsive.css">
     <style>


     </style>
</head>
<body>
    <section class="hero">
        <div class="container">
            <h2>Discover Your Dream Vacation</h2>
            <p>Tailored travel experiences for families, couples, and friends</p>
            <a href="destinations.php" class="btn">Explore Destinations</a>
        </div>
    </section>

    <section class="packages">
    <div class="container">
        <h2>Our Special Packages</h2>
        <div class="package-grid">
            <div class="package-card">
                <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4" alt="Family Package">
                <h3>Family Getaways</h3>
                <p>Fun-filled vacations designed for families with kids of all ages. Enjoy guided tours, theme parks, kids’ activities, and comfortable accommodations with family-friendly amenities. Destinations include amusement parks, nature retreats, and cultural cities with packages tailored to both kids and adults. Make lasting memories with your loved ones.</p>
            </div>
            <div class="package-card">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Romantic sunset beach">
                <h3>Romantic Escapes</h3>
                <p>Intimate experiences for couples looking to reconnect. Sunset beach dinners, private villas, couple spa sessions, and romantic sightseeing in breathtaking destinations. Ideal for honeymoons, anniversaries, or spontaneous romantic getaways. Destinations include Maldives, Venice, Santorini, and more.</p>
            </div>
            <div class="package-card">
                <img src="https://images.unsplash.com/photo-1523906834658-6e24ef2386f9" alt="Friends Package">
                <h3>Adventure with Friends</h3>
                <p>Thrilling group adventures for friends who love to explore. From mountain treks and desert safaris to nightlife tours and water sports, this package is all about bonding and thrill. Popular among college groups and adventure seekers, with customizable itineraries across exotic locations like Bali, Goa, Thailand, and Rishikesh.</p>
            </div>
        </div>
    </div>
</section>

    </section>
       <section id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Have questions or ready to book your dream vacation? Get in touch with our travel experts.</p>
            </div>
            
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Let's Talk About Your Next Adventure</h3>
                    <p>Our team is available 24/7 to help you plan your perfect getaway. Whether you have questions about our packages or need custom itinerary suggestions, we're here to help.</p>
                    
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">📍</div>
                            <div>
                                <h4>Our Office</h4>
                                <p>123 Travel Street, Wanderlust City</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">📞</div>
                            <div>
                                <h4>Call Us</h4>
                                <p>+1 (800) 123-4567</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">✉️</div>
                            <div>
                                <h4>Email Us</h4>
                                <p>info@wanderlusttravels.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <form>
                        <input type="text" placeholder="Your Name" required>
                        <input type="email" placeholder="Your Email" required>
                        <input type="tel" placeholder="Phone Number">
                        <textarea placeholder="Your Message" required></textarea>
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="social-links">
                    <a href="#">📱</a>
                    <a href="#">💻</a>
                    <a href="#">📷</a>
                    <a href="#">🕊️</a>
                </div>
                <p>&copy; 2025 Canvas Travels. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
