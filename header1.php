<?php session_start(); ?>

fetch('header1.html')    // Load the header dynamically
    .then(response => response.text())
    .then(data => {
        document.getElementById('header-placeholder').innerHTML = data;

        const greeting = document.getElementById("greeting");
        const session_name = <?php echo json_encode($_SESSION['user_name'] ?? null); ?>;
        const name = session_name != null ? session_name : "אורח";
        greeting.textContent = `שלום ${name}`;

        if (name == "Administrator") {
            fetch('navAdmin.html')
                .then(response2 => response2.text())
                .then(data2 => {
                    document.getElementById('header-placeholder').innerHTML += data2;
            });
        }
    });
