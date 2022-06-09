<?php 
    include 'connect.php';
    $id = $_GET['updateid'];

    $sql = "SELECT * FROM crud WHERE id = $id";
    $query = $dsn->query($sql);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $password= $row['password'];

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        $sql = "UPDATE crud SET id = :id, name = :name, email = :email, 
        mobile = :mobile, password = :password WHERE id = $id";
        $query = $dsn->prepare($sql);
        $query->execute(['id'=>$id, 'name' => $name, 'email' => $email, 'mobile' => $mobile, 'password' => $password]);

        if($query) {
            header('location: display.php');
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
    <div class="container my-5">
    <form method="post">
  <div class="mb-3">
    <label for="name" class="form-label"><b>Name</b></label>
    <input type="text" class="form-control mb-3" name="name" placeholder="Change your name" 
    value=<?php echo $name?>>

    <label for="email" class="form-label"><b>Email</b></label>
    <input type="email" class="form-control mb-3" name="email" placeholder="Change your Email"
    value=<?php echo $email?>>

    <label for="mobile" class="form-label"><b>Mobile</b></label>
    <input type="text" class="form-control mb-3" name="mobile" placeholder="Change your phone number"
    value=<?php echo $mobile?>>

    <label for="password" class="form-label"><b>Password</b></label>
    <input type="text" class="form-control mb-3" name="password" placeholder="Change your password"
    value=<?php echo $password?>>

  </div>
    
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    
</body>
</html>