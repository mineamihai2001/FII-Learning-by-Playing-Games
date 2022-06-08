var username = document.getElementById("username");
var password = document.getElementById("password");
var confirmPassword = document.getElementById("confirm_password");
var submitBtn = document.getElementById("submit-btn");
var form = document.getElementById("first");
submitBtn.disabled = true;

var pass = true;

confirmPassword.addEventListener("change", () => {
  if (confirmPassword.value != password.value) {
    pass = false;
    console.log("not the same password");
    password.style.background = "#ff8282";
    confirmPassword.style.background = "#ff8282";
  } else {
    pass = true;
    password.style.background = "#fff";
    confirmPassword.style.background = "#fff";
  }
  console.log(confirmPassword.value);
});

submitBtn.addEventListener("click", () => {
    console.log(pass + " " + username.value)
  if (pass && username.value != "") form.submit();
});
