<?php
    include 'navbar.php';
    include 'connection.php';

    $user_id = $_SESSION ['id'];

    $sql = "SELECT * from transactions where customers_id = '$user_id'";
    $get_txns = $con->query($sql);
?>

<div class="row">
    <div class ="col-md-6 mx-auto">
        <div class =" card card-body">
            <h4>Transactions History</h4>
            <div class = "d-flex justify-content-between align-items-center">
                <table class ="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>       
                    </thead>
                    <tbody>
                        <?php
                            while ($txn = $get_txns->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $txn ['customers_id']?></td>
                            <td><?php echo $txn ['date']?></td>
                            <td><?php echo $txn ['amount']?></td>
                            <td><?php echo $txn ['type']?></td>
                            <td><?php echo $txn ['status']?></td>
                        </tr>  
                        <?php
                            }
                        ?>        
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>



<?php
    include 'footer.php'
?>