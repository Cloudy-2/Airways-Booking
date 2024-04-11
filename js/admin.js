// JavaScript for dropdown functionality
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
document.addEventListener("DOMContentLoaded", function() {
    // Add click event listener to the logout link
    document.querySelector('a.logout').addEventListener('click', function(event) {
        // Prevent default link behavior
        event.preventDefault(); 
        
        // Display notification
        alert("You have been logged out successfully!");
        
        // Redirect to logout.php after the alert is shown
        window.location.href = "logout.php";
    });
});