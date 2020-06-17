var username_valid = 0,password_valid = 0,password_confirm_valid = 0,email_valid = 0;
var username = [ "AzRush1","AzRush2"];
var password = ["1234567","123456"];
var username_now,password_now;

register_username_check = function()
{
    let username1 = document.getElementById("register_username");
    let patt;
    if ((username1 == null) || (username1.value.length == 0))
    {
        document.getElementById("register_username_check").innerHTML = "Username required";
        document.getElementById("register_username_check").style.color = "#ff2d1f";
        username_valid = 0;
    }
    else
    {
        if(username1.value.length < 6)
        {
            document.getElementById("register_username_check").innerHTML = "Too short";
            document.getElementById("register_username_check").style.color = "#ff2d1f";
            username_valid = 0;
            return;
        }
        patt = /^[a-zA-Z0-9_]+$/;
        if (patt.test(username1.value))
        {
            document.getElementById("register_username_check").innerHTML = "";
            username_valid = 1;
            username_now = username1.value;
        }
        else
        {
            document.getElementById("register_username_check").innerHTML = "Number,Letter and _ Only";
            document.getElementById("register_username_check").style.color = "#ff2d1f";
            username_valid = 0;
        }
    }
}
register_password_check = function ()
{
    let password1 = document.getElementById("register_password");
    if ((password1 == null) || (password1.value.length == 0))
    {
        document.getElementById("register_password_check").innerHTML = "password required";
        document.getElementById("register_password").style.color = "#ff2d1f";
        password_valid = 0;
    }
    else
    {
        if(password1.value.length < 6)
        {
            document.getElementById("register_password_check").innerHTML = "Too short";
            document.getElementById("register_password_check").style.color = "#ff2d1f";
            password_valid = 0;
            return;
        }
        let patt = /^.*(?=.{6,})(?=.*[A-Za-z0-9!@#$%^&*_?]).*$/;
        if(/^\d+$/.test(password1.value))
        {
            document.getElementById("register_password_check").innerHTML = "Password can't be numeric!";
            document.getElementById("register_password_check").style.color = "#ff2d1f";
            password_valid = 0;
            return;
        }
        else if (patt.test(password1.value))
        {
            document.getElementById("register_password_check").innerHTML = "";
            password_valid = 1;

        }
        else
        {
            document.getElementById("register_password_check").innerHTML = "Number,Letter and !@#$%^&*_? Only";
            document.getElementById("register_password_check").style.color = "#ff2d1f";
            password_valid = 0;
        }
    }
}

register_email_check = function()
{
    let email1 = document.getElementById("register_email");
    let patt;
    if ((email1 == null) || (email1.value.length == 0))
    {
        document.getElementById("register_email_check").innerHTML = "E-mail required";
        document.getElementById("register_email_check").style.color = "#ff2d1f";
        email_valid = 0;
    }
    else
    {
        patt = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;;
        if (patt.test(email1.value))
        {
            document.getElementById("register_email_check").innerHTML = "";
            email_valid = 1;

        }
        else
        {
            document.getElementById("register_email_check").innerHTML = "invalid E-mail address";
            document.getElementById("register_email_check").style.color = "#ff2d1f";
            email_valid = 0;
        }
    }
};


register_password_confirm_check = function ()
{
    let password1 = document.getElementById("register_password");
    let password2 = document.getElementById("register_password_confirm");
    if ((password1 == null) || (password1.value.length == 0))
    {
        document.getElementById("register_password_confirm_check").innerHTML = "password required";
        document.getElementById("register_password_confirm_check").style.color = "#ff2d1f";
        password_confirm_valid = 0;
    }
    else
    {
        if (password1.value === password2.value)
        {
            document.getElementById("register_password_confirm_check").innerHTML = "";
            password_confirm_valid = 1;
            password_now = password1.value;
        }
        else
        {
            document.getElementById("register_password_confirm_check").innerHTML = "Not match";
            document.getElementById("register_password_confirm_check").style.color = "#ff2d1f";
            password_confirm_valid = 0;
        }
    }
}

register_check = function ()
{
    if(!username_valid || !password_valid || !password_confirm_valid || !email_valid)
    {
        window.alert("Failed!");
        window.location.href = "../src/register.html";
        return;
    }
}
register_close = function ()
{
    let register_window = document.getElementById("registerPanel");
    let username1 = document.getElementById("register_username");
    let password1 = document.getElementById("register_password");
    let captcha = document.getElementById("register_captcha");
    let address1 = document.getElementById("register_address");
    let email1 = document.getElementById("register_email");
    let telephone1 = document.getElementById("register_telephone");
    let confirm_password1 = document.getElementById("register_password_confirm");
    address1.value = "";
    telephone1.value = "";
    username1.value = "";
    password1.value = "";
    captcha.value = "";
    confirm_password1.value = "";
    email1.value = "";
    register_username_check();
    register_password_check();
    register_password_confirm_check();
    register_email_check();
    register_window.hidden = true;
}
register_show = function ()
{
    let register_window = document.getElementById("registerPanel");
    register_window.hidden = false;
}
