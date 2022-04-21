<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction History</title>
    <link rel="stylesheet" type="text/css" href="transaction_history.css">
</head>
<body>
    <?php
        include 'connect.php';
        $sql ="select * from transaction";
        $query =mysqli_query($conn, $sql);
    ?>
        <div class="container">
            <h2 class="h2">Transaction History</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Transaction Id</th>
                            <th class="text-center">Sender</th>
                            <th class="text-center">Receiver</th>
                            <th class="text-center">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($rows = mysqli_fetch_assoc($query))
                            {
                        ?>
                        <tr>
                            <td class="py-2"><?php echo $rows['transaction_id']; ?></td>
                            <td class="py-2"><?php echo $rows['sender']; ?></td>
                            <td class="py-2"><?php echo $rows['receiver']; ?></td>
                            <td class="py-2"><?php echo $rows['amount']; ?> </td>
                                    
                            <?php
                                }

                            ?>
                        </tr> 
                    </tbody>
                </table>
        </div>

    <footer class="text-center mt-5 py-2">
        <p>&copy 2022. Made by <b>Mithlesh Kumar Yadav</b> <br></p>
    </footer>
</body>
</html>