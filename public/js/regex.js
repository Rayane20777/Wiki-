document.getElementById("myForm").addEventListener("submit", function(event) {
  // Validation for Name
  var nameInput = document.getElementById("name");
  var nameError = document.getElementById("nameError");
  var nameRegex = /^[a-zA-Z]+$/;

  if (!nameRegex.test(nameInput.value)) {
    nameError.textContent = "Name must contain only letters.";
    event.preventDefault();
  } else {
    nameError.textContent = "";
  }

  // Validation for Email
  var emailInput = document.getElementById("email");
  var emailError = document.getElementById("emailError");
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(emailInput.value)) {
    emailError.textContent = "Invalid email address.";
    event.preventDefault();
  } else {
    emailError.textContent = "";
  }

  // Validation for Password
  var passwordInput = document.getElementById("password");
  var passwordError = document.getElementById("passwordError");
  var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

  if (!passwordRegex.test(passwordInput.value)) {
    passwordError.textContent = "Password must be at least 8 characters long and contain at least one digit, one lowercase letter, and one uppercase letter.";
  } else {
    event.submit();
  }
});
