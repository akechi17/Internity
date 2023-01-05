function myFunction() {
    var passField = document.getElementById("password");
    var showPass = document.getElementById("show");
    var hidePass = document.getElementById("hide");

    if (passField.type === "password") {
        passField.type = "text";
        showPass.style.display = "block";
        hidePass.style.display = "none";
    } else {
        passField.type = "password";
        showPass.style.display = "none";
        hidePass.style.display = "block";
    }
}