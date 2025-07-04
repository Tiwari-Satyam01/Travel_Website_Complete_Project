<?php
include 'includes/db.php';
include 'includes/header.php';
if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $phone = $conn->real_escape_string($_POST['phone']);
    $destination = $conn->real_escape_string($_POST['destination']);
    $date = $_POST['travel_date'];
    $feedback = $conn->real_escape_string($_POST['feedback']);

    $conn->query("INSERT INTO trips(user_id, phone, destination, travel_date, feedback) 
                  VALUES($user_id, '$phone', '$destination', '$date', '$feedback')");
    $trip_id = $conn->insert_id;

    foreach ($_POST['traveler_name'] as $i => $name) {
        $name = $conn->real_escape_string($name);
        $aadhar = $conn->real_escape_string($_POST['traveler_aadhar'][$i]);
        $conn->query("INSERT INTO travelers(trip_id, name, aadhar) VALUES($trip_id, '$name', '$aadhar')");
    }

    $msg = "Trip and traveler details submitted!";
}
?>
<link rel="stylesheet" href="css/booking.css">
<link rel="stylesheet" href="css/responsive.css">
<div class="booking-container">
    <h2>Book Your Trip</h2>
    <?php if (isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="post" class="booking-form">
        <div class="form-group">
            <label>Phone Number:</label>
            <input type="tel" name="phone" required>
        </div>

        <div class="form-group">
            <label>Where do you want to go?</label>
            <select name="destination" required>
                <option value="" disabled selected>Select a destination</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Maldives">Maldives</option>
                <option value="Switzerland">Switzerland</option>
                <option value="India">India</option>
                <option value="Russia">Russia</option>
            </select>
        </div>

        <div class="form-group">
            <label>Date of Travel:</label>
            <input type="date" name="travel_date" required>
        </div>

        <div class="form-group">
            <label>Number of People:</label>
            <input type="number" id="peopleCount" min="1" max="10" value="1" required>
            <button type="button" onclick="addTravelers()">Add Travelers</button>
        </div>

        <div id="travelersContainer"></div>

        <div class="form-group">
            <label>Feedback / Special Requests:</label>
            <textarea name="feedback" rows="4" placeholder="Let us know your preferences..."></textarea>
        </div>

        <button type="submit">Submit Booking Request</button>
    </form>
</div>

<script>
function addTravelers() {
    const count = parseInt(document.getElementById('peopleCount').value);
    const container = document.getElementById('travelersContainer');
    container.innerHTML = '';

    for (let i = 1; i <= count; i++) {
        container.innerHTML += `
            <div class="form-group traveler">
                <h4>Traveler ${i}</h4>
                <label>Name:</label>
                <input type="text" name="traveler_name[]" required>
                <label>Aadhar Number:</label>
                <input type="text" name="traveler_aadhar[]" class="aadharInput" inputmode="numeric" required>
            </div>
        `;
    }
}
</script>
<script>
document.querySelector("form").addEventListener("submit", function (e) {
    const aadharFields = document.querySelectorAll(".aadharInput");
    for (let i = 0; i < aadharFields.length; i++) {
        const aadhar = aadharFields[i].value.trim();

//Important: Custom validation- Aadhar must be exactly 12 digits (0-9)
        if (!/^\d{12}$/.test(aadhar)) {
            alert(`Traveler ${i + 1}: Enter a valid 12-digit Aadhar number.`);
            aadharFields[i].focus();
            e.preventDefault(); 
            return false;
        }
    }
});
</script>
<?php include 'includes/footer.php'; ?>
