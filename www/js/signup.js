const username = document.getElementById("username");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm_password");
const submitBtn = document.getElementById("submit-btn");
const agree = document.getElementById("agree");
const form = document.getElementById("first");
let pass = false;

confirmPassword.addEventListener("change", () => {
  if (confirmPassword.value !== password.value) {
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
    console.log("here " + pass + " | " + username.value)
  if(!username.value) {
    username.style.background = "#ff8282";
  }
  if (pass && username.value !== "" && agree.checked) {
    username.style.background = "#fff";
    form.submit();
  }
});
