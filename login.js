// This function will be called when the form is submitted
function validateForm(event) {
    // Prevent the form from submitting immediately
    event.preventDefault();

    // Get the values of the username and password fields
    let username = document.getElementById('fname').value;
    let password = document.getElementById('pass').value;

    // Check if username and password are empty
    if (username === "" || password === "") {
        alert("Username and Password cannot be empty");
        return false; // Do not submit the form
    }

    // Example: Check if username and password are correct (for demo purposes)
    if (username === "testuser" && password === "testpass") {
        alert("Login successful");
        // Submit the form or redirect the user to another page
        // Uncomment the next line to redirect the user after successful login
        // window.location.href = "dashboard.html";
    } else {
        alert("Invalid Username or Password");
        return false; // Do not submit the form
    }
}
