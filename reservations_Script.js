
// Added comment: Changed event listener to trigger on "Make Reservation" button click
    document.querySelector("#make-reservation").addEventListener("click", function() {
        document.querySelector(".popup").classList.add("active");
    });

    // Add event listener to close the details form when the close button is clicked
    document.querySelector(".popup .close-btn").addEventListener("click", function() {
        document.querySelector(".popup").classList.remove("active");
    });

    // Add event listener for form submission
    document.querySelector(".form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Validate email confirmation
        const email = document.querySelector("#email").value;
        const confirmEmail = document.querySelector("#confirm-email").value;
        
        if (email !== confirmEmail) {
            alert("Emails do not match. Please try again.");
            return;
        }
        
        // If emails match, show confirmation popup
        const name = document.querySelector("#name").value;
        const surname = document.querySelector("#surname").value;
        const number = document.querySelector("#number").value;

        // Added comment: Get reservation details
        const date = document.querySelector("#reservation-date").value;
        const time = document.querySelector("#reservation-time").value;
        const guests = document.querySelector("#reservation-guests").value;
        const table = document.querySelector("#reservation-table").value;

        // Added comment: Updated confirmation details structure
        const confirmationDetails = `
            <div class="confirmation-column">
                <h3>Personal Details</h3>
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Surname:</strong> ${surname}</p>
                <p><strong>Phone Number:</strong> ${number}</p>
                <p><strong>Email:</strong> ${email}</p>
            </div>
            <div class="confirmation-column">
                <h3>Reservation Details</h3>
                <p><strong>Date:</strong> ${date}</p>
                <p><strong>Time:</strong> ${time}</p>
                <p><strong>Number of Guests:</strong> ${guests}</p>
                <p><strong>Table Number:</strong> ${table}</p>
            </div>
        `;

        document.querySelector("#confirmation-details").innerHTML = confirmationDetails;
        document.querySelector(".popup").classList.remove("active");
        document.querySelector(".confirmation-popup").classList.add("active");
    });

    // Add event listener to close the confirmation popup
    document.querySelector("#confirmation-close-btn").addEventListener("click", function() {
        document.querySelector(".confirmation-popup").classList.remove("active");
    });

    // Added comment: Updated event listeners for back buttons
    document.querySelector("#details-back-btn").addEventListener("click", function() {
        document.querySelector(".popup").classList.remove("active");
    });

    document.querySelector("#confirmation-back-btn").addEventListener("click", function() {
        document.querySelector(".confirmation-popup").classList.remove("active");
        document.querySelector(".popup").classList.add("active");
    });

    // Added comment: Removed event listener for reservation form submission
