<?php
    include("function0.php");

    $objCrudAdmin = new crudApp();
   
    $students = $objCrudAdmin->display_data();

    if(isset($_GET['status'])){
        if($_GET['status']='edit'){
            $id = $_GET['id'];
            $returndata=  $objCrudAdmin->display_data_by_id($id);
        }
    }
    if(isset($_POST['update_btn'])){
        $msg = $objCrudAdmin-> update_data($_POST);                             
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index0.php">Aiub Student Id</a></h2>
        <form class="form" action="" method = "post" enctype="multipart/form-data">
            <?php if(isset($msg)){echo $msg;}?>
            <input class="form-control mb-2" type="text" name ="u_std_name" value="<?php echo $returndata['std_name']; ?>">
            <input class="form-control mb-2" type="number" name ="u_std_roll" value="<?php echo $returndata['std_roll']; ?>">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-2" type="file" name ="u_std_img">
            <input type="hidden" name = "std_id" value = "<?php echo $returndata['Id']; ?>">

            <input type="submit" value="Update Information" name="update_btn" class="form-control bg-warning">


        </form>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>