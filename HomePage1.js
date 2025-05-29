fetch('header1.html')    // Load the header dynamically
    .then(response => response.text())
    .then(data => {
        document.getElementById('header-placeholder').innerHTML = data;
    });

function getUserNameFromURL() {
    const params = new URLSearchParams(window.location.search);
    const name = params.get("name");
    return name ? decodeURIComponent(name) : "אורח";
}

function greetOnLoad() {
    const greeting = document.getElementById("greeting");
    const name = getUserNameFromURL();
    greeting.textContent = `שלום ${name}`;
}

window.onload = greetOnLoad;