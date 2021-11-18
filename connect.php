<?php
 require ('connection.php');
      $allStudents =  "SELECT firstname, lastname, email FROM registration_tb";
      $fetch_students = mysqli_query($connect,$allStudents);
      $fetch_all = mysqli_fetch_all($fetch_students,MYSQLI_ASSOC);
       
    
 
 function secureText($text)
  {
   return trim(htmlspecialchars(htmlentities($text)));
  }
  if(isset($_GET['data'])){
    $email = $_GET['data'];
     $check_email = "DELETE FROM `registration_tb` WHERE email ='$email'";
     $delete_query =mysqli_query($connect,$check_email);
     header("Location: http://localhost/assignments/connect.php");
      exit();

   }
  
  if (isset($_POST['submit'])) {
  $firstname = secureText($_POST['firstname']);
  $lastname = secureText($_POST['lastname']);
  $email = secureText($_POST['email']);
  $password = secureText($_POST['password']);
  if ( $firstname == "" ||  $lastname == "" || $email =="" || $password =="") {
    echo "fill the input please";
  }else{
    $selectEmail ="SELECT firstname, lastname,email FROM `registration_tb` WHERE email ='$email'";
    $select_query = mysqli_query($connect,$selectEmail);
    if($select_query->num_rows > 0) {
      echo" User exist";
    } else {
      $query = "INSERT INTO registration_tb (firstname, lastname, email, password) VALUES('$firstname','$lastname','$email','$password')";
      $insert_query = mysqli_query($connect, $query);
      header("refresh: 1");
      exit();
      if ($insert_query) {
        echo("students inserted successfully");
      }else {
        echo("unable to insert successfully");
      }
     
    }
  }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <title>Document</title>
</head>
<style>
  a{
    width:40px;
  }
</style>
<body>
    <div class="container">
      <div class="row pt-4">
        <div class="col-md-4 col-sm-6 shadow pt-4 rounded pb-4 ">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
          <h2 class="text-center">Register Student</h2>
          <div class="form-group ">
          <input class="form-control"  type="text" name="firstname" placeholder="Enter Firstname">
          </div>
        <div class="form-group">
        <input class="form-control"  type="text" name="lastname" placeholder="Enter Lastname">
        </div>
          <div class="form-group">
          <input class="form-control"  type="text" name="email" placeholder="Enter Email Address">
          </div>
          <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
          <input class="form-control" type="submit" value="submit" name="submit">
          </div>
        </form>
        </div>
        <div class="col-md-8 col-sm-6 border-left shadow">
       <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">S/n</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Email</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
    <tbody>
    
      <?php 
        if ( isset($fetch_all) && count($fetch_all) > 0):
         foreach( $fetch_all as $key=>$value):
        ?>
        <tr>
          <td><?php print_r ($key+1 )?></td>
          <td><?php print_r ($value['firstname'] )?></td>
          <td><?php print_r ($value['lastname'] )?></td>
          <td><?php print_r ($value['email'])?></td>
          <td><a href="http://localhost/assignments/edit.php?edit=<?php echo $value['email']?>" class="btn-floating btn-large waves-effect waves-light black"><i class="icon-edit icon-large "></i></a></td>
        
          
          <td><a href="http://localhost/assignments/connect.php?data=<?php echo $value['email']?>" class="btn-floating btn-large waves-effect waves-light red"><i class="icon-trash icon-large "></i></a></td>
        </tr>
        <?php 
        endforeach; 
        else :
          echo "<h2>  Not students yet!</h2>";

        endif;
        
        ?>
    </tbody>
    </table>
       </div>
      </div>
    </div>
  

  
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>