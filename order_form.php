<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta charset="UTF-8">
	<title>הזמנה</title>
	<link rel="stylesheet" href="bookEntry.css">
</head>
<body>
	<div class="form-container">
		<form action="submit_order.php" method="POST">
	        <h1>הזמנה</h1>
            
			<?php
				session_start();
				$username = $_SESSION['user_name'];
				echo "<label>שם משתמש <input type='text' name='username' value='$username' readonly></label>";
			?>

            <?php $date = date('d/m/Y'); ?>
            <label>תאריך <input type="text" name="orderDate" value="<?= $date ?>" readonly></label>

			<label>עיר <input type="text" name="city" pattern="[a-zA-Z]+" required></label>
			<label>רחוב <input type="text" name="street" pattern="[a-zA-Z]+" required></label>
			<label>מספר בית <input type="text" name="houseNumber" pattern="[0-9]+" maxlength="3" required></label>
			<label>מיקוד <input type="text" name="zipCode" pattern="[0-9]+" maxlength="8" required></label>
			
			<label>משלוח</label>
			<select name="shipping" required>
				<option value="1">כן (תוספת של ₪30)</option>
				<option value="0">לא (איסוף עצמי)</option>
			</select>

			<?php
				echo "<p id='amountDisplay'></p>";
			?>

			<button type="submit">בצע הזמנה</button>
			<input type="reset" value="איפוס">
		</form>
	</div>

    <script>
        const shippingSelect = document.querySelector('select');
        const amountDisplay = document.getElementById('amountDisplay');
        const amount = <?php echo json_encode(isset($_SESSION['order_amount']) ? (int)$_SESSION['order_amount'] : 0); ?>;
        const shippingCost = 30;

        function updateAmount() {
            const shipping = parseInt(shippingSelect.value);
            const total = amount + (shipping ? shippingCost : 0);
            amountDisplay.textContent = "סכום הזמנה: ₪" + total;
        }

        shippingSelect.addEventListener('change', updateAmount);
        window.addEventListener('DOMContentLoaded', updateAmount);
    </script>
</body>
</html>
