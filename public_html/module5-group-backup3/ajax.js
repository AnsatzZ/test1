// ajax.js

function loginAjax(event) {
    event.preventDefault();
    const username = document.getElementById("username").value; // Get the username from the form
    const password = document.getElementById("password").value; // Get the password from the form
    colorChange(username)
    // Make a URL-encoded string for passing POST data:

    
    const data = { 'username': username, 'password': password };


    fetch("login_ajax.php", {
            method: 'POST',
            body: JSON.stringify(data),
            headers: { 'content-type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {console.log(data)})
        .catch(err => alert(err));
}


function signupAjax(event) {
    const username = document.getElementById("username").value; // Get the username from the form
    const password = document.getElementById("password").value; // Get the password from the form

    // Make a URL-encoded string for passing POST data:
    const data = { 'username': username, 'password': password };

    fetch("signup_ajax.php", {
            method: 'POST',
            body: JSON.stringify(data),
            headers: { 'content-type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => alert(data.success ? "You've been signed up!" : `Check ${data.message}`))
        .catch(err => alert(err));
       
}



document.getElementById("login_btn").addEventListener("click", loginAjax, false); // Bind the AJAX call to button click

document.getElementById("signup_btn").addEventListener("click", signupAjax, false); // Bind the AJAX call to button click