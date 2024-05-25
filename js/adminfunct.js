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




document.addEventListener("DOMContentLoaded", function() {
    var confirmButtons = document.querySelectorAll('.btn-outline-Success'); // Updated to target the correct class name

    confirmButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var row = this.closest('tr');
            var firstName = row.cells[1].innerText;
            var lastName = row.cells[2].innerText;
            var email = row.cells[3].innerText;
            var seat = row.cells[5].innerText;
            var acc = row.cells[6].innerText;
            var price = row.cells[7].innerText.replace('₱ ', ''); // Remove currency symbol

            // Send data to PHP script using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../model/con_book.php", true); // Adjust the path to your PHP file
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "success") {
                        // Handle success
                        alert("Booking confirmed successfully!");
                    } else {
                        // Handle error
                        alert("Error confirming booking. Please try again later.");
                    }
                }
            };
            xhr.send("con_fname=" + firstName + "&con_lname=" + lastName + "&con_email=" + email + "&con_seat=" + seat + "&con_acc=" + acc + "&con_price=" + price);
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

$(document).ready(function() {
    $('.view-btn').on('click', function() {
        // Get data from the button's data- attributes
        var mainPassenger = $(this).data('mainpassenger');
        var flightID = $(this).data('flightid');
        var firstName = $(this).data('firstname');
        var lastName = $(this).data('lastname');
        var email = $(this).data('email');
        var contactNumber = $(this).data('contactnumber');
        var seat = $(this).data('seat');
        var accommodation = $(this).data('accommodation');
        var totalPrice = $(this).data('totalprice');
        var status = $(this).data('status');
        var seatNumber = $(this).data('seatnumber');

        // Populate the modal with the fetched data
        var modalBody = $('#viewModal .modal-body');
        modalBody.html(`
            <p><strong>Main Passenger:</strong> ${mainPassenger}</p>
            <p><strong>Flight ID:</strong> ${flightID}</p>
            <p><strong>First Name:</strong> ${firstName}</p>
            <p><strong>Last Name:</strong> ${lastName}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>Contact Number:</strong> ${contactNumber}</p>
            <p><strong>Seat:</strong> ${seat}</p>
            <p><strong>Accommodation:</strong> ${accommodation}</p>
            <p><strong>Total Price:</strong> ₱${totalPrice}</p>
            <p><strong>Status:</strong> ${status}</p>
            <p><strong>Seat Number:</strong> ${seatNumber}</p>
        `);
    });
});
// Click event for Other Passenger button
$('.view-btn-other').on('click', function() {
    // Get data from the button's data- attributes
    var mainPassenger = $(this).data('mainpassenger');
    var flightID = $(this).data('flightid');
    var firstName = $(this).data('firstname');
    var lastName = $(this).data('lastname');
    var email = $(this).data('email');
    var contactNumber = $(this).data('contactnumber');
    var seat = $(this).data('seat');
    var accommodation = $(this).data('accommodation');
    var totalPrice = $(this).data('totalprice');
    var status = $(this).data('status');
    var seatNumber = $(this).data('seatnumber');

    // Populate the modal with the fetched data
    var modalBody = $('#viewModalOtherPassenger .modal-body');
    modalBody.html(`
        <p><strong>Main Passenger:</strong> ${mainPassenger}</p>
        <p><strong>Flight ID:</strong> ${flightID}</p>
        <p><strong>First Name:</strong> ${firstName}</p>
        <p><strong>Last Name:</strong> ${lastName}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Contact Number:</strong> ${contactNumber}</p>
        <p><strong>Seat:</strong> ${seat}</p>
        <p><strong>Accommodation:</strong> ${accommodation}</p>
        <p><strong>Ticket Price:</strong> ₱${totalPrice}</p>
        <p><strong>Status:</strong> ${status}</p>
        <p><strong>Seat Number:</strong> ${seatNumber}</p>
    `);
});


function showFullImage(imgElement) {
    // Get the full image data from the data-full-image attribute
    var fullImageData = imgElement.getAttribute('data-full-image');

    // Set the src of the fullImage img element to the full image data
    var fullImage = document.getElementById('fullImage');
    fullImage.src = fullImageData;

    // Display the modal
    var imageModal = document.getElementById('imageModal');
    imageModal.style.display = 'flex';
}

function closeModal() {
    // Hide the modal
    var imageModal = document.getElementById('imageModal');
    imageModal.style.display = 'none';
}

// Add event listener to the close button
document.getElementById('closeButton').addEventListener('click', closeModal);

// Add event listener to close the modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeModal();
    }
});
