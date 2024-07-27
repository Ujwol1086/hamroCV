function validate() {
    const mail = document.getElementById('mail').value;
    const pass = document.getElementById('pass').value;

    console.log("Email:", mail);
    console.log("Password:", pass);

    let mailR = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (mail === "" || pass === "") {
        alert("All fields are required.");
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

    return true;
}
