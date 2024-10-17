const passwords = document.querySelectorAll("[data-password]");
const errorField = document.querySelector("#errorField");
const loginForm = document.querySelector("#loginForm");
const registerForm = document.querySelector("#registerForm");

const USERNAME_REGEX = /^[a-zA-Z0-9_]{1,12}$/;
const PASSWORD_REGEX =
  /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[$.,\-#])[A-Za-z0-9$.,\-#]{8,12}$/;

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(e.target);
  const username = formData.get("username");
  const password = formData.get("password");

  const isValidUsername = validateUsername(username);
  const isValidPassword = validatePassword(password);

  errorField.textContent = "";

  if (!isValidUsername) {
    errorField.textContent +=
      "The username does not meet the requirements.<br>";
  }
  if (!isValidPassword) {
    errorField.textContent +=
      "The password does not meet the requirements.<br>";
  }

  if (isValidUsername && isValidPassword) {
    e.target.submit();
  }
});

registerForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const arePasswordsEqual = verifyPasswordsAreEqual(passwords);

  if (!arePasswordsEqual) {
    errorField.textContent = "The passwords don't match";
  }

  if (arePasswordsEqual) {
    e.target.submit();
  }
});

const verifyPasswordsAreEqual = (passwords) => {
  const allequal = [...passwords].every(
    (el) => el.value === passwords[0].value,
  );

  return allequal;
};

const validateUsername = (username) => {
  const regex = USERNAME_REGEX;
  return regex.test(username);
};

const validatePassword = (password) => {
  const regex = PASSWORD_REGEX;
  return regex.test(password);
};
