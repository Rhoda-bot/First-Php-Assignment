<?php
session_start();
if (isset($_POST['submit'])) {
  $arr = [];
  $arr['fname'] = FunctionName($_POST['fname']);
  $arr['lname'] = FunctionName($_POST['lname']);
  $arr['email'] = FunctionName($_POST['email']);
  $arr['dept'] = FunctionName($_POST['dept']);
  $stdArr =[];
  
  if (count($stdArr)<0) {
    return $stdArr;
  }else if (count($stdArr)<=0) {
    array_push($stdArr,$arr);
  }
}
 

  function FunctionName( $text)
  {
    return trim(htmlspecialchars(htmlentities($text)));
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
    <thead>
      <tr>
       
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
      <tbody>
        <?php foreach ($stdArr as $key=>$value):?>
          
          <tr>
            <td><?php echo($value['fname'])?></td>
            <td><?php echo($value['lname'])?></td>
            <td><?php echo($value['email'])?></td>
            <td><?php echo($value['dept'])?></td>
            <td><form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
            <input type="hidden" name='del' value='<?php echo($key)?>'>
              <input type="submit" name="delete" value="submit">
            </form></td>
           
          </tr>
        <?php endforeach;?>
      </tbody>
    </thead>
  </table>
  
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
    <input type="text"  name="fname" placeholder="firstname">
    <input type="text"  name="lname" placeholder="lastname">
    <input type="text"  name="email" placeholder="email">
    <input type="text"   name="dept" placeholder="department">
    <input type="submit" name="submit" value="submit">
  </form>
</body>
</html>