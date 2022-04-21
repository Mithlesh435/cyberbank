<?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $from = $_GET['e_account'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from user_database where e_account=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from user_database where e_account=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check insufficient balance.
    else if($amount > $sql1['e_avl_balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }

    else {
                // deducting amount from sender's account
                $newbalance = $sql1['e_avl_balance'] - $amount;
                $sql = "UPDATE user_database set e_avl_balance=$newbalance where e_account=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['e_avl_balance'] + $amount;
                $sql = "UPDATE user_database set e_avl_balance=$newbalance where e_account=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['e_name'];
                $receiver = $sql2['e_name'];
                $trid = random_int(100000000000, 999999999999);
                $sql = "INSERT INTO transaction(transaction_id,sender,receiver,amount) VALUES ('$trid','$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);
                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='index.php';
                           </script>";
                }
                $newbalance= 0;
                $amount =0;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" type="text/css" href="transaction.css">
</head>

<body>
	<div class="container">
        <h2 class="h2">Transaction</h2>
            <?php
                include 'connect.php';
                $sid=$_GET['e_account'];
                $sql = "SELECT * FROM  user_database where e_account=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
        <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Account No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">E-mail</th> 
                        <th class="text-center">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2"><?php echo $rows['e_account'] ?></td>
                        <td class="py-2"><?php echo $rows['e_name'] ?></td>
                        <td class="py-2"><?php echo $rows['e_phone'] ?></td>
                        <td class="py-2"><?php echo $rows['e_mail'] ?></td>
                        <td class="py-2"><?php echo $rows['e_avl_balance'] ?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <br><br><br>
        <label style="color : white; margin-left:-5px;"><b>Transfer To: </b></label>
        <input class="acc_box" type="text" placeholder="Account No" name="to" value=""
        style="border:1px solid #8bc53f;
                background-color: transparent;
                margin-left: 4px;
                width:205px;
                padding:12px;
                color:white;
                border-radius:10px
                ">
       
        
        <br>
        <br>
            <label style="color : white;padding:12px;"><b>Amount:</b></label>
            <input placeholder="Amount" type="number" class="form-control1" name="amount" required style="border-radius: 10px;
            border: none;
            width: 205px;
            padding: 12px;
            background: none;
            border:1px solid #8bc53f;
            color: white;">   
            <br><br>
                <div class="text-center" >
            <button class="btn-mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
    <footer class="text-center mt-5 py-2">
        <p>&copy 2022. Made by <b>Mithlesh Kumar Yadav</b></p>
    </footer>
</body>
</html>