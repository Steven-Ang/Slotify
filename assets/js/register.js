const hideLogin = document.querySelector(".hideLogin");
const hideRegister = document.querySelector(".hideRegister");
const loginForm = document.querySelector("#loginForm");
const registerForm = document.querySelector("#registerForm");

hideLogin.addEventListener("click", () => {
  loginForm.style.display = "none";
  registerForm.style.display = "block";
});

hideRegister.addEventListener("click", () => {
  loginForm.style.display = "block";
  registerForm.style.display = "none";
});