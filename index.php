<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menu = [
        'Burger' => 50,
        'Fries' => 75,
        'Steak' => 150
    ];

    $item = $_POST['item'];
    $quantity = (int) $_POST['quantity'];
    $cash = (int) $_POST['cash'];

    $totalPrice = $menu[$item] * $quantity;

    $_SESSION['item'] = $item;
    $_SESSION['quantity'] = $quantity;
    $_SESSION['total_price'] = $totalPrice;
    $_SESSION['cash'] = $cash;

    if ($cash < $totalPrice) {
        header('Location: error.php');
        exit();
    } else {
        header('Location: receipt.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
</head>
<body>

<h1><strong>Menu</strong></h1>
<table border="1">
    <tr>
        <th><strong>Item</strong></th>
        <th><strong>Amount</strong></th>
    </tr>
    <tr>
        <td>Burger</td>
        <td>50</td>
    </tr>
    <tr>
        <td>Fries</td>
        <td>75</td>
    </tr>
    <tr>
        <td>Steak</td>
        <td>150</td>
    </tr>
</table>
<br>

<form method="POST">
    <label for="item">Select an order:</label>
    <select name="item" id="item">
        <option value="Burger">Burger</option>
        <option value="Fries">Fries</option>
        <option value="Steak">Steak</option>
    </select><br><br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" required><br><br>

    <label for="cash">Cash:</label>
    <input type="number" name="cash" id="cash" required><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
