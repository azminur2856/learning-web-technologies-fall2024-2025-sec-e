function searchUser() {
  let search = document.getElementById("search").value;
  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", "search.php?query=" + encodeURIComponent(search), true);
  xhttp.send();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("userTableBody").innerHTML = this.responseText;
    }
  };
}
