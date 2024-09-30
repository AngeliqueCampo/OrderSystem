<?php
session_start();

if (!isset($_SESSION['item']) || !isset($_SESSION['total_price'])) {
    header('Location: index.php'); 
    exit();
}

$totalPrice = $_SESSION['total_price'];
$cash = $_SESSION['cash'];
$change = $cash - $totalPrice;
$dateTime = date('m/d/Y H:i:s');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; 
            padding: 20px;
            
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
        }
        .receipt-container {
            border: 2px dotted black;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            text-align: left; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        h1 {
            text-align: center; 
            font-size: 50px;
            margin: 0 0 20px 0; 
        }
        .receipt-details {
            font-size: 40px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <h1>RECEIPT</h1>
    <div class="receipt-details">
        <p>Total Price: <?php echo $totalPrice; ?></p>
        <p>Cash Provided: <?php echo $cash; ?></p>
        <p>Change: <?php echo $change; ?></p>
        <p><?php echo $dateTime; ?></p>
    </div>
</div>

</body>
</html>

<?php
session_unset();
session_destroy();
?>
