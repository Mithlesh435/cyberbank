<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" type="text/css" href="customers.css">
</head>

<body>
    

<?php
    include 'connect.php';
    $sql = "SELECT * FROM user_database";
    $result = mysqli_query($conn,$sql);
?>

<div class="container">
    <h2 class="h2">Transfer Money</h2>
         <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Account No</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Phone</th>
                    <th scope="col" class="text-center">E-Mail</th>                          
                    <th scope="col" class="text-center">Balance</th>
                    <th scope="col" class="text-center">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td class="py-2"><?php echo $rows['e_account']?></td>
                    <td class="py-2"><?php echo $rows['e_name'] ?></td>
                    <td class="py-2"><?php echo $rows['e_phone']?></td>
                    <td class="py-2"><?php echo $rows['e_mail']?></td>
                    <td class="py-2"><?php echo $rows['e_avl_balance']?></td>
                    <td><a href="transaction.php?e_account= <?php echo $rows['e_account'] ;?>"><button type="button" class="_button">Transact</button></a></td> 
                </tr>
                <?php
                    }
                ?> 
            </tbody>
        </table>   

    <footer class="copyright">
        <p>&copy 2022. Made by <b>Mithlesh Kumar Yadav</b></p>
    </footer> 
</div>
    
</body>
</html>