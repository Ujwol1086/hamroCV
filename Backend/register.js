console.log("JavaScript file loaded");


function validate() {
    const name = document.getElementById('name').value;
    const mail = document.getElementById('mail').value;
    const pass = document.getElementById('pass').value;
    const cpass = document.getElementById('cpass').value; 

    console.log("Name:", name); 
    console.log("Email:", mail);
    console.log("Password:", pass);
    console.log("Confirm Password:", cpass); 

    let nameR = /^[a-zA-Z\s]+$/;
    let mailR = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (name === "" || mail === "" || pass === "" || cpass === "") {
        alert("All fields are required.");
        return false;  
    }

    if (!nameR.test(name)) {
        alert("Name should only contain characters and whitespace.");
        return false;
    }

    if (!mailR.test(mail)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (pass.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }
    if (!/[a-z]/.test(pass)) {
        alert("Password must contain at least one lowercase letter.");
        return false;
    }
    if (!/[A-Z]/.test(pass)) {
        alert("Password must contain at least one uppercase letter.");
        return false;
    }
    if (!/\d/.test(pass)) {
        alert("Password must contain at least one number.");
        return false;
    }
    if (!/[@$!%*?&]/.test(pass)) {
        alert("Password must contain at least one special character (e.g., @$!%*?&).");
        return false;
    }

    if (pass !== cpass) {
        alert("Password and confirm password do not match.");
        return false;
    }

    return true;
}
