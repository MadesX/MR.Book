function checkout() {
  alert("מעבר לתשלום יתבצע בקרוב!");
}

// דוגמה להוספת פריטים - בהמשך נחליף לדינאמי
document.addEventListener("DOMContentLoaded", () => {
  const cartItems = document.getElementById("cart-items");        // דוגמא לבדיקה שלי
  cartItems.innerHTML = `
    <div class="item">
      <p>📘 שם הספר: דוגמה</p>
      <p>מחיר: ₪80</p>
    </div>
  `;
  document.getElementById("total").textContent = "₪80";
});
