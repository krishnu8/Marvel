
function validation() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var mobile = document.getElementById('mobile').value;
    var cpassword = document.getElementById('cpassword').value;
    var email = document.getElementById('email').value;

    var usercheck = /^[A-Za-z. ]{3,20}$/;
    var mobilecheck=/^[789][0-9]{9}$/;
    var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
    // var emailcheck =/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/
    var emailcheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (usercheck.test(username)) {
        document.getElementById('usererror').innerHTML = "";
    }
    else {
        document.getElementById('usererror').innerHTML = "**Invalid Username";
        return false;
    }

    if (passwordcheck.test(password)) {
        document.getElementById('passworderror').innerHTML = "";
    }
    else {
        document.getElementById('passworderror').innerHTML = "**Invalid Password";
        return false;
    }

    if (cpassword.match(password)) {
        document.getElementById('cpassworderror').innerHTML = "";
    }
    else {
        document.getElementById('cpassworderror').innerHTML = "**Password Not Matched";
        return false;
    }

    if (emailcheck.test(email)) {
        document.getElementById('emailerror').innerHTML = "";
    }
    else {
        document.getElementById('emailerror').innerHTML = "**Invalid Email";
        return false;
    }
    if (mobilecheck.test(mobile)) {
        document.getElementById('numbererror').innerHTML = "";
    }
    else {
        document.getElementById('numbererror').innerHTML = "**Invalid phone number";
        return false;
    }
}
function validation1() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var real_pass = 'asd!@#123';
    // var emailcheck =/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/
    var emailcheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   // var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
    if (emailcheck.test(email)) {
        document.getElementById('emailerror').innerHTML = "";
    }
    else {
        document.getElementById('emailerror').innerHTML = "**Invalid Email";
        return false;
    }
    if (password==real_pass) {
        document.getElementById('passworderror').innerHTML = "";
        alert('login successful')
    }
    else {
        document.getElementById('passworderror').innerHTML = "Wrong Password. Hint: asd!@#123";
        return false;
    }
}