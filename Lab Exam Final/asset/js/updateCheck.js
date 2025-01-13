function validateForm() {
  let errors = [];

  let name = document.getElementById("name").value.trim();

  if (name === "") {
    errors.push("Name is required.");
  }

  let phone = document.getElementById("phone").value.trim();
  if (phone === "") {
    errors.push("Contract No is required.");
  }

  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("repassword").value;
  if (password !== "") {
    if (password.length < 8) {
      errors.push("Password must be at least 8 characters long.");
    } else if (password !== confirmPassword) {
      errors.push("Passwords do not match.");
    }
  }

  let ul = document.getElementById("errorListUpdate");
  ul.innerHTML = "";

  for (let error of errors) {
    let li = document.createElement("li");
    li.textContent = error;
    li.style.color = "red";
    li.style.fontSize = "14px";
    li.style.fontWeight = "bold";
    ul.appendChild(li);
  }

  return errors.length === 0;
}
