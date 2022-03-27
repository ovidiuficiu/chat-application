const searchBar = document.querySelector(".search input"),
    searchIcon = document.querySelector(".search button"),
    usersList = document.querySelector(".users-list");

searchIcon.onclick = () => {
    searchBar.classList.toggle("show");
    searchIcon.classList.toggle("active");
    searchBar.focus();
    if (searchBar.classList.contains("active")) {
        searchBar.value = "";
        searchBar.classList.remove("active");
    }
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    fetch("/list-users?search=" + searchTerm)
        .then((response) => response.text())
        .then(function (data) {
            usersList.innerHTML = data;
        });
}

setInterval(() => {
    fetch("/list-users")
        .then((response) => response.text())
        .then(function (data) {
            if (!searchBar.classList.contains("active")) {
                usersList.innerHTML = data;
            }
        });
}, 500);

