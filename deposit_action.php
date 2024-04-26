<?php
include 'connection.php';

$amount = $_POST['amount'];
$password = $_POST['password'];

$user_id = $_SESSION ['id'];

$sql = "SELECT * from customers where id ='$user_id'";
$get_user = $con->query ($sql);

$user = $get_user->fetch_assoc();

if ($password != $user ['password']) {
    echo "Incorrect password";
    header ("location: deposit.php?message=Incorrect password");
    return;
}

if ($amount <=0) {
    header ("location: deposit.php?message=Invalid amount");
    return;
}
    $new_balance = $user['balance'] + $amount;

    $sql = "UPDATE customers set balance = '$new_balance' where id = '$user_id'";
    $con->query ($sql);

    //transactions table
    $sql ="INSERT into transactions(customers_id, amount, type, status) VALUES ('$user_id', '$amount', 'credit', 'successful')";
    $con->query ($sql);

    header ("location: dashboard.php?message=Deposit Successful");

?>

