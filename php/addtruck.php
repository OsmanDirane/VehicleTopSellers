<?php
// including website header 
include '../php/header.php';
// Checking errors in code 
$code = $model = $price = '';

$errors = array('code'=> '','model'=> '','price'=> '', );

if(isset($_POST['Submit'])){

  //check code to see if empty or invalid format

    if(empty($_POST['code'])){
        $errors['code'] = 'A code is required!';
    }else{
        $code = $_POST['code'];
       if(!preg_match("/^[A-Za-z0-9-]+$/", $code)){
        $errors['code'] = 'Invalid code';
       }
    }
    //check model to see if empty or invalid format
    if(empty($_POST['model'])){
        $errors['model'] ='A model is required! ';
    }else{
        $model = $_POST['model'];
        if(!preg_match("/^[A-Za-z0-9-]+$/", $model)){
            $errors['model'] = 'Invalid model';
        }
    }

    //check price to see if empty or invalid format

    if(empty($_POST['price'])){
        $errors['price'] =  'A price is required! ';
    }else{
        $price = $_POST['price'];
       if(!is_numeric($price)){
        $errors['price'] = 'Invalid price';
       }
    }

    // checking to see if there are any errors if not add into database and send to product table 
    if(array_filter($errors)){

   }else{
    $query = "INSERT INTO trucks VALUES ('$code', '$model', '$price')";
     mysqli_query($con, $query);

     header('Location: truck.php');
   }
}
?>


<body>
<div class="container">

<!-- Form which takes user input as the fields in my database table as well as some error values incase there are any errors -->
  <form id="form" action="addtruck.php" method="POST" >

  <label class="code" for="code">Code</label>
  <div class="code">
  <input  class="new"type="text" value="<?php echo htmlspecialchars($code) ?>" name="code" id="">
  <div class="error"><?php echo $errors['code'] ?></div>
  </div>

  <label class="model" for="model">Model</label> 
  <div class="model">
  <input class="new" type="text" value="<?php echo htmlspecialchars($model) ?>" name="model" id="" >
  <div class="error"><?php echo $errors['model'] ?></div>
  </div>

  <label class="price" for="price">Price</label>

  <div class="price">
  <input  class="new" type="text" value="<?php echo htmlspecialchars($price) ?>" name="price" id="">
  <div class="error"><?php echo $errors['price'] ?></div>
  </div>

  <input type="submit" id="submit" value="Add New Truck" name="Submit">


  </form>
  </div>

