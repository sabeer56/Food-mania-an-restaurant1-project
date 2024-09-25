document.getElementById("form").addEventListener("submit", function(event) {
    event.preventDefault(); 
    
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username.trim() === "") {
        alert("Username cannot be empty!");
        return;
    }

    if (password.trim() === "") {
        alert("Password cannot be empty!");
        return;
    }

    var keys = Object.keys(localStorage);

    var matchFound = false;

    keys.forEach(function(key) {
        var storedUserDetailsString = localStorage.getItem(key);
        var storedUserDetails = JSON.parse(storedUserDetailsString);
      
        if (username === storedUserDetails.username && password === storedUserDetails.password) {
            alert("Sign in successful!");
            matchFound = true;
        }
    });

    if (!matchFound) {
        alert("Incorrect username or password.");
    }
});
