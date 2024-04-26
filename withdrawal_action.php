<?php
include 'connection.php';

$amount = $_POST['amount'];
$password = $_POST['password'];

$user_id = $_SESSION['id'];

$sql = "SELECT * from customers where id ='$user_id'";
$get_user = $con->query($sql);

$user = $get_user->fetch_assoc();

if ($password != $user['password']) {
    echo "Incorrect password";
    header("location: withdrawal.php?message=Incorrect password");
    return;
}
$balance = $user['balance'] ;

if ($amount >= $balance) {
    header("location: withdrawal.php?message=Insufficient funds");
    return;
}

$new_balance = $user['balance'] - $amount;

$sql = "UPDATE customers set balance = '$new_balance' where id = '$user_id'";
$con->query($sql);

//transactions table
$sql = "INSERT into transactions(customers_id, amount, type, status) VALUES ('$user_id', '$amount', 'debit', 'successful')";
$con->query($sql);

header("location: dashboard.php?message=Withdrawal Successful");
