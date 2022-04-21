<?php
include 'connect.php';

if(isset($_POST['submit'])){
    if(!empty($_POST['_name']) && !empty($_POST['_number']) && !empty($_POST['_email']) && !empty($_POST['_deposit'])){
        $name = $_POST['_name'];
        $number = $_POST['_number'];
        $email = $_POST['_email'];
        $acc = random_int(100000000000, 999999999999);
        //$acc = $number*2;
        $deposit = $_POST['_deposit'];
        $query = "INSERT INTO user_database(e_account,e_name,e_phone,e_mail,e_avl_balance) values('$acc','$name','$number','$email','$deposit')";
        $run = mysqli_query($conn,$query) ;
        if($run){
            echo "<script> alert('Form Submitted suscessfully');
                        window.location='index.php';
                    </script>";
        }else{
            echo "<script> alert('Fail');
                        window.location='user_form.php';
                    </script>";
        }
    }
    else{
        echo "<script> alert('All fields required');
                    window.location='user_form.php';
                </script>";
    }
}

?>