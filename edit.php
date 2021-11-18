<?php
  require('connection.php');
 $firstname =isset($_GET['firstname']);
 $lastname = isset($_GET['lastname']);
 $email =isset($_GET['edit']);
if (isset($_GET['edit'])) {
 
    $email = $_GET['edit'];
     $selectEmail ="SELECT student_id, firstname, lastname,email FROM `registration_tb` WHERE email ='$email'";
      $select_query = mysqli_query($connect,$selectEmail);
      $fetch_stud = mysqli_fetch_all($select_query,MYSQLI_ASSOC);
      print_r($fetch_stud );
      $firstname = $fetch_stud[0]['firstname'];
      $lastname = $fetch_stud[0]['lastname']; 
      $id =  $fetch_stud[0]['student_id'];
      print_r($id);
  }
  if (isset($_GET['update'])) {
   
   
    
    $connect = mysqli_connect('localhost','root','','studentdatabase');
    if (mysqli_error($connect)) {
     die("connected successfully!");
    }
   $email = $_GET['update'];
   $firstname =$_GET['firstname'];
   $lastname = $_GET['lastname'];
   $update_query = "UPDATE registration_tb SET firstname = '$firstname',lastname = '$lastname' WHERE email =  '$email'";
  
        $updated_query = mysqli_query($connect,$update_query);
        if ($updated_query ) {
         echo "student successfully updated!";
         header("Location: http://localhost/assignments/connect.php","refresh: 1");
         exit();
        }else{
          echo "unable to update";
        }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
   

      <div class="container">
        <div class="row">
          <div class="col-4 rounded shadow pt-3 pb-3 mx-auto">
            <form  action="<?php $_SERVER['PHP_SELF']?>">
            <h5 class="text-center">Edit First or Last Name</h5>
            <div class="form-group ">
              <input class="form-control" value="<?php echo $firstname?>" type="text" name="firstname" placeholder="Enter Firstname">
              </div>
              <div class="form-group">
              <input class="form-control" value="<?php echo $lastname?>" type="text" name="lastname" placeholder="Enter Lastname">
            </div>
            <div class="form-group">
              <input class="form-control" type="submit" value="<?php echo$email;?>" name="update" type="text" >
            </div>
            </form>
          </div>
        </div>
      </div>
   
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>