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
function handleSeatSelection(passengerType, passengerId, seatId) {
    // Check if the seat is already occupied or selected
    var seatElement = document.getElementById(seatId);
    if (seatElement.classList.contains('occupied') || seatElement.classList.contains('selected')) {
        // If the seat is occupied or selected, do nothing
        return;
    }

    // Clear previously selected seats for the same passenger type and ID
    var selectedSeats = document.querySelectorAll(`.seat.selected[data-passenger-type='${passengerType}'][data-passenger-id='${passengerId}']`);
    selectedSeats.forEach(function(seat) {
        seat.classList.remove('selected');
        seat.removeAttribute('data-passenger-type');
        seat.removeAttribute('data-passenger-id');
    });

    // Mark the selected seat as 'selected' and set data attributes
    seatElement.classList.add('selected');
    seatElement.setAttribute('data-passenger-type', passengerType);
    seatElement.setAttribute('data-passenger-id', passengerId);

    // Update the selected seat number in the dropdown
    var seatSelectDropdown = document.getElementById(`${passengerType}_SeatSelect${passengerId}`);
    if (seatSelectDropdown) {
        seatSelectDropdown.value = seatId;
    }
}

// Function to clear selected seats when the modal is closed
function clearSelectedSeatsOnModalClose(passengerType, passengerId) {
    var selectedSeats = document.querySelectorAll(`.seat.selected[data-passenger-type='${passengerType}'][data-passenger-id='${passengerId}']`);
    selectedSeats.forEach(function(seat) {
        seat.classList.remove('selected');
        seat.removeAttribute('data-passenger-type');
        seat.removeAttribute('data-passenger-id');
    });
    // Reset the dropdown value
    var seatSelectDropdown = document.getElementById(`${passengerType}_SeatSelect${passengerId}`);
    if (seatSelectDropdown) {
        seatSelectDropdown.value = '';
    }
}

// Add event listeners to clear selected seats when the modal is closed
document.addEventListener('DOMContentLoaded', function() {
    var mainPassengerModals = document.querySelectorAll('.modal[id^="seatSelectionModal"]');
    var otherPassengerModals = document.querySelectorAll('.modal[id^="OtherseatSelectionModal"]');

    mainPassengerModals.forEach(function(modal) {
        modal.addEventListener('hidden.bs.modal', function() {
            var passengerId = modal.getAttribute('id').replace('seatSelectionModal', '');
            clearSelectedSeatsOnModalClose('main', passengerId);
        });
    });

    otherPassengerModals.forEach(function(modal) {
        modal.addEventListener('hidden.bs.modal', function() {
            var passengerId = modal.getAttribute('id').replace('OtherseatSelectionModal', '');
            clearSelectedSeatsOnModalClose('other', passengerId);
        });
    });
});



// Add hover effect for a few seconds
document.querySelectorAll('.seat').forEach(function(seat) {
    seat.addEventListener('mouseover', function() {
        seat.classList.add('hover-effect');
        setTimeout(function() {
            seat.classList.remove('hover-effect');
        }, 2000); // Adjust time in milliseconds as needed
    });
});


// Define a JavaScript function to handle seat selection for other passengers
function handleOtherPassengerSeatSelection(otherPassengerId, seatId) {
    // Check if the seat is already occupied or selected
    var seatElement = document.getElementById(seatId);
    if (seatElement.classList.contains('occupied') || seatElement.classList.contains('selected')) {
        // If the seat is occupied or selected, do nothing
        return;
    }

    // Clear previously selected seats
    var selectedSeats = document.querySelectorAll('.seat.selected');
    selectedSeats.forEach(function(seat) {
        seat.classList.remove('selected');
    });

    // Mark the selected seat as 'selected'
    seatElement.classList.add('selected');

    // Update the selected seat number in the dropdown
    var seatSelectDropdown = document.getElementById('Other_SeatSelect' + otherPassengerId);
    if (seatSelectDropdown) {
        seatSelectDropdown.value = seatId;
    }
}

// Add hover effect for a few seconds (for other passengers)
document.querySelectorAll('.seat').forEach(function(seat) {
    seat.addEventListener('mouseover', function() {
        seat.classList.add('hover-effect');
        setTimeout(function() {
            seat.classList.remove('hover-effect');
        }, 2000); // Adjust time in milliseconds as needed
    });
});



function redirectToUserInfo(email) {
    window.location.href = 'userinfo.php?email=' + email;
}
function redirectToOtherUserInfo(email) {
    window.location.href = 'otheruser.php?email=' + email;
}



