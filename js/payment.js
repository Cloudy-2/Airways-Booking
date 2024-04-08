function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup.style.display === 'block') {
        popup.style.display = 'none';
    } else {
        popup.style.display = 'block';
    }
}

// Event listener for GCash pay button click
document.getElementById('gcash-pay-button').addEventListener('click', function() {
    const mobileNumber = document.getElementById('mobile-number').value;
    if (mobileNumber.length === 11) {
        alert(`Paying PHP 6,517.00 to GLOBALMIRANDAMINER with mobile number ${mobileNumber}`);
    } else {
        alert('Please enter a valid 11-digit mobile number.');
    }
    togglePopup('gcash-popup'); // Close GCash popup after processing
});

// Event listener for PayPal login button click
document.getElementById('paypal-login-button').addEventListener('click', function() {
    const emailOrMobile = document.getElementById('email-or-mobile').value;
    const password = document.getElementById('password').value;

    if (emailOrMobile.length > 0 && password.length > 0) {
        alert(`Logging in with email or mobile number: ${emailOrMobile}`);
    } else {
        alert('Please enter both your email or mobile number and password.');
    }
    togglePopup('paypal-popup'); // Close PayPal popup after processing
});

// Event listener for sign-in button click
document.getElementById('sign-in-button').addEventListener('click', function() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username.length > 0 && password.length > 0) {
        alert(`Signing in with username: ${username}`);
    } else {
        alert('Please enter both your username and password.');
    }
    togglePopup('sign-in-popup'); // Close Sign-in popup after processing
});
