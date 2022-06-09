<?php 
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center fw-bold ">CRUD Manipulation System</h1>
        <a href="user.php"><button class="btn btn-primary my-5">Add User</button></a>
    <table class="table table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php 
    $sql = 'SELECT * FROM crud';
    $query = $dsn->query($sql);
    while($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>
            <th scope="row">'.$row->id.'</th>
            <td>'.$row->name.'</td>
            <td>'.$row->email.'</td>
            <td>'.$row->mobile.'</td>
            <td>'.$row->password.'</td>
            <td>
            <a href="update.php?updateid='.$row->id.'"><button class="btn btn-primary">Update</button></a>
            <a href="delete.php?deleteid='.$row->id.'"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>';
    }
  ?>
  </tbody>
</table>
    </div>
    
</body>
</html>