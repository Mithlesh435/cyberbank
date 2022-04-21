
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width",inital-scale=1.0>
        <title>"CyberBank"</title>
        <link rel="stylesheet" href="user_form.css">
    </head>
    <body>  
        <div class="container">
            <h2 class="h2">New User</h2>
            <form action="add_user.php"class="form-box" method="post">
                <div class="name-box">
                    <input type="text" placeholder="Name" name="_name" value="">
                </div>
    
                <div class="number-box">
                    <input type="number" placeholder="Phone" name="_number" value="">
                </div>
    
                <div class="email-box">
                    <input type="email" placeholder="E-mail" name="_email" value="">
                </div>
                
                <div class="deposit-box">
                    <input type="number" placeholder="Deposit amount" name="_deposit" value="">
                </div>
                <button type="submit" name="submit" class="btn1">Add User</button>
            </form>
        </div> 
    </body>
</html>

