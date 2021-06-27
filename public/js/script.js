const dashboard_link = document.querySelector(".dashboard-link");
const inventory_link = document.querySelector(".inventory-link");
const dashboard = document.getElementById("dashboard");
const inventory = document.getElementById("inventory");
const heading = document.querySelector("header h1");

inventory.style.display = "none";
heading.innerText = "Dashboard";

inventory_link.addEventListener("click", function () {
    dashboard_link.classList.remove("active");
    inventory_link.classList.add("active");
    dashboard.style.display = "none";
    inventory.style.display = "block";
    heading.innerText = "Inventory";
});

dashboard_link.addEventListener("click", function () {
    inventory_link.classList.remove("active");
    dashboard_link.classList.add("active");
    dashboard.style.display = "block";
    inventory.style.display = "none";
    heading.innerText = "Dashboard";
});

const heights = document.querySelectorAll("tbody td:nth-child(3)");
for (let height of heights) {
    height.innerText = height.innerText + " cm";
}

const addButton = document.querySelector(".table-responsive button");
const addButtonModal = document.querySelector("#formAdd button");
addButton.style.cssText =
    "background-color: #34eb86; border: none; padding: 10px; border-radius: 5px; font-weight: bold;";
addButtonModal.style.cssText =
    "background-color: #34eb86; border: none; padding: 10px; border-radius: 5px; font-weight: bold; margin-top: 10px;";

var modal = document.getElementById("myModal");

var span = document.getElementsByClassName("close")[0];

addButton.onclick = function () {
    modal.style.display = "block";
};

span.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

const mainContent = document.querySelector("main");

mainContent.addEventListener("click", function () {
    document.getElementById("nav-toggle").checked = false;
});

function setDarkMode(isDark) {
    if (isDark) {
        document.body.setAttribute("id", "darkmode");
    } else {
        document.body.setAttribute("id", "");
    }
}

const mode = document.querySelector(".mode i");

mode.addEventListener("click", function () {
    mode.classList.toggle("bi-lightbulb-off-fill");
    if (mode.classList.contains("bi-lightbulb-off-fill")) {
        console.log("light mode");
    } else {
        console.log("dark mode");
    }
});
