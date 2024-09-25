document.getElementById("form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (username.trim() === "") {
        alert("Username cannot be empty!");
        return;
    }

    if (email.trim() === "") {
        alert("Email cannot be empty!");
        return;
    }

    if (password.trim() === "") {
        alert("Password cannot be empty!");
        return;
    }

    var userDetails = {
        username: username,
        email: email,
        password: password
    };

    var userDetailsString = JSON.stringify(userDetails);
    
    localStorage.setItem("userDetails", userDetailsString);
    alert("Sign up done successfully!");
});