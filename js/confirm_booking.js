// Function to toggle pop-up visibility
function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup.style.display === "none" || popup.style.display === "") {
        popup.style.display = "block";
    } else {
        popup.style.display = "none";
    }
}

// Function to close pop-up upon successful login
function loginAndClosePopup(popupId) {
    // Simulate login process
    // Here, you can perform your login logic
    var emailOrMobile = '';
    var password = '';
    if (popupId === 'paypal-popup') {
        emailOrMobile = document.getElementById('paypal-email-or-mobile').value;
        password = document.getElementById('paypal-password').value;
        // Handle PayPal login here
        // Display a notification message
        alert("Logged in with PayPal successfully!");
    } else if (popupId === 'mastercard-popup') {
        emailOrMobile = document.getElementById('mastercard-username').value;
        password = document.getElementById('mastercard-password').value;
        // Handle Mastercard login here
        // Display a notification message
        alert("Logged in with Mastercard successfully!");
    } else if (popupId === 'gcash-popup') {
        // Handle GCash login here
        // Display a notification message
        alert("Logged in with GCash successfully!");
    }

    // Close the pop-up upon successful login
    togglePopup(popupId);
    // Enable the radio buttons after successful login
    enableRadioButtons();
}

// Function to validate input and perform login
function validateAndLogin(inputField1, inputField2, popupId) {
    var input1 = document.getElementById(inputField1).value;
    var input2 = document.getElementById(inputField2).value;

    if (!input1 || !input2) {
        alert("Please enter your information.");
        return;
    }

    // Perform login process
    loginAndClosePopup(popupId);
}

// Function to enable radio buttons
function enableRadioButtons() {
    var radioButtons = document.querySelectorAll('input[name="payment-method"]');
    for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].disabled = false;
    }
}

// Function to close pop-up and unselect radio button
function closePopupAndUnselectRadio(popupId, radioId) {
    togglePopup(popupId);
    document.getElementById(radioId).checked = false;
}

// Add event listener to close icon
var closeIcons = document.querySelectorAll('.close-icon');
closeIcons.forEach(function(closeIcon) {
    closeIcon.addEventListener('click', function() {
        var popupParent = this.parentElement;
        var popupId = popupParent.getAttribute('id');
        if (popupId) {
            var radioId = popupId.split('-')[0] + '-radio';
            closePopupAndUnselectRadio(popupId, radioId);
        }
    });
});
 // Function to calculate total price based on accommodation selection for each passenger
 function calculateTotalPrice(passengerIndex) {
    var selectedAccommodation = document.getElementById("accommodation_" + passengerIndex).value;
    var originalPrice = parseFloat(document.getElementById("mainticket1").value); // Using the base ticket price from the hidden input

    // Calculate ticket price for the selected accommodation
    var ticketPrice = originalPrice; // Default to base price
    if (selectedAccommodation === "business") {
        ticketPrice *= 1.5; // Business class multiplier
    } else if (selectedAccommodation === "first") {
        ticketPrice *= 2; // First class multiplier
    }

    // Check passenger age for discount
    var dob = new Date(document.getElementById("dob_" + passengerIndex).value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
        age--;
    }

    // Apply discount for passengers aged 60 or above
    if (age >= 60) {
        ticketPrice *= 0.9; // 10% discount
        document.getElementById("discount_indicator_" + passengerIndex).style.display = "inline"; // Show discount indicator
    } else {
        document.getElementById("discount_indicator_" + passengerIndex).style.display = "none"; // Hide discount indicator
    }

    // Update the displayed ticket price for the passenger
    document.getElementById("displayed_ticket_price_" + passengerIndex).textContent = ticketPrice.toFixed(2);

    // Update the hidden input field for ticket price
    document.getElementById("hidden_ticket_price_" + passengerIndex).value = ticketPrice.toFixed(2);

    // Update the overall price
    updateOverallPrice();
}


