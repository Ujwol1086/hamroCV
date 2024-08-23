console.log("JavaScript file loaded");


function validate()
{
    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const cpassword = document.getElementById('cpass').value;

    console.log("Name:", fullname);
    console.log("Email:", email);
    console.log("Password:", password);
    console.log("Confirm Password:", cpass);

    let nameR = /^[a-zA-Z\s]+$/;
    let mailR = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (fullname === "" || email === "" || password === "" || cpass === "")
    {
        alert("All fields are required.");
        return false;
    }

    if (!nameR.test(fullname))
    {
        alert("Name should only contain characters and whitespace.");
        return false;
    }

    if (!mailR.test(email))
    {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password.length < 8)
    {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    if (/^\d+$/.test(password)) {
        alert("Password cannot be only numbers.");
        return false;
    }
    
    if (!/[a-z]/.test(password))
    {
        alert("Password must contain at least one lowercase letter.");
        return false;
    }
   
    if (!/[A-Z]/.test(password))
    {
        alert("Password must contain at least one uppercase letter.");
        return false;
    }
    if (!/\d/.test(password))
    {
        alert("Password must contain at least one number.");
        return false;
    }
    if (!/[@$!%*?&]/.test(password))
    {
        alert("Password must contain at least one special character (e.g., @$#!%*?&).");
        return false;
    }

    if (password !== cpassword)
    {
        alert("Password and confirm password do not match.");
        return false;
    }

    return true;
}
