document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('.checkout-form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        const name = document.querySelector('input[name="card_name"]').value.trim();
        const number = document.querySelector('input[name="card_number"]').value;
        const expiry = document.querySelector('input[name="expiry"]').value;
        const cvv = document.querySelector('input[name="cvv"]').value;

        const errors = [];

        if (!name) {
            errors.push("יש להזין שם בעל כרטיס.");
        }

        if (!/^\d{16}$/.test(number)) {
            errors.push("מספר כרטיס חייב להכיל 16 ספרות בדיוק.");
        }

        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiry)) {
            errors.push("תוקף הכרטיס לא תקין. יש להזין בפורמט MM/YY.");
        }

        if (!/^\d{3}$/.test(cvv)) {
            errors.push("CVV חייב להכיל 3 ספרות.");
        }

        if (errors.length > 0) {
            e.preventDefault();
            alert(errors.join("\n"));
        }
    });
});
