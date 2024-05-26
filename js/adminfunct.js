document.addEventListener("DOMContentLoaded", function() {
    var dropdowns = document.getElementsByClassName("dropdown");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.getElementsByClassName("dropdown-content")[0];
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
});

// Add click event listener to the logout link
document.addEventListener("DOMContentLoaded", function() {
    // Get the logout link
    var logoutLink = document.querySelector('a.logout');
    
    // Add click event listener to the logout link
    logoutLink.addEventListener('click', function(event) {
        // Prevent default link behavior
        event.preventDefault(); 
        
        // Display a confirmation modal or notification
        if (confirm("Are you sure you want to log out?")) {
            // If the user confirms, redirect to logout.php
            window.location.href = "logout.php";
        }
    });
    
    
    // Add click event listener to delete buttons
    var deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the parent row of the clicked button
            var parentRow = this.closest('tr');
            
            // Ask for confirmation before deleting
            if (confirm("Are you sure you want to delete?")) {
                // Remove the parent row from the DOM
                parentRow.remove();
            }
        });
    });
    });

function confirmBooking(mainPassengerId) {
    // Send the main passenger ID to inbox.php using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../inbox.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from inbox.php if needed
            console.log(xhr.responseText);
        }
    };
    xhr.send("mainPassengerId=" + mainPassengerId);
}
function submitEmailForm(button) {
    var mainPassengerData = button.getAttribute('data-main-passenger');
    var email = JSON.parse(mainPassengerData).email; // Assuming email is stored in the 'email' attribute of mainPassengerData

    // Set the email value in the hidden input field
    document.getElementById('emailInput').value = email;

    // Submit the form
    document.getElementById('viewForm').submit();
}

//zoom receipt
document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with the class 'zoomable-image'
    var zoomableImages = document.querySelectorAll('.zoomable-image');
    
    // Loop through each zoomable image
    zoomableImages.forEach(function(image) {
        // Add click event listener to each image
        image.addEventListener('click', function() {
            // Create a new div element to display the enlarged image
            var zoomedImage = document.createElement('div');
            zoomedImage.className = 'zoomed-image';
            
            // Create an image element inside the zoomed div
            var img = document.createElement('img');
            img.src = image.src;
            zoomedImage.appendChild(img);
            
            // Append the zoomed image div to the body
            document.body.appendChild(zoomedImage);
            
            // Add click event listener to close the zoomed image when clicked
            zoomedImage.addEventListener('click', function() {
                document.body.removeChild(zoomedImage);
            });
        });
    });
});


// Define a JavaScript function to handle seat selection
function handleSeatSelection(mainPassengerId, seatId) {
    // Check if the seat is already occupied or selected
    if (document.getElementById(seatId).classList.contains('occupied') || document.getElementById(seatId).classList.contains('selected')) {
        // If the seat is occupied or selected, do nothing
        return;
    }

    // Clear previously selected seats
    var selectedSeats = document.querySelectorAll('.seat.selected');
    selectedSeats.forEach(function(seat) {
        seat.classList.remove('selected');
    });

    // Mark the selected seat as 'selected'
    document.getElementById(seatId).classList.add('selected');

    // Update the selected seat number in the dropdown
    var seatSelectDropdown = document.getElementById('SeatSelect' + mainPassengerId);
    seatSelectDropdown.value = seatId;
}
function redirectToUserInfo(email) {
    window.location.href = 'userinfo.php?email=' + email;
}
function redirectToOtherUserInfo(email) {
    window.location.href = 'otheruser.php?email=' + email;
}



