<?php
    include("function0.php");

    $objCrudAdmin = new crudApp();
    if(isset($_POST['std_info'])){
        $return_msg = $objCrudAdmin->add_data($_POST);
    }
    $students = $objCrudAdmin->display_data();

    if(isset($_GET['status'])){
        if($_GET['status']='delete'){
            $delete_id = $_GET['id'];
            $delete_msg = $objCrudAdmin ->delete_data($delete_id);
        }
    }


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index0.php">Aiub Student Id</a></h2>
        <?php if(isset($delete_msg))
        {echo $delete_msg;} 
        ?>
        <form class="form" action="" method = "post" enctype="multipart/form-data">
            <?php if(isset($return_msg)){echo $return_msg;}?>
            <input class="form-control mb-2" type="text" name ="std_name" placeholder="enter Your name">
            <input class="form-control mb-2" type="number" name ="std_roll" placeholder="enter Your roll">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-2" type="file" name ="std_img">
            <input type="submit" value="Add Information" name="std_info" class="form-control bg-warning">


        </form>
    </div>

    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php while($student = mysqli_fetch_assoc($students)) { ?>
                <tr>
                    <td><?php echo $student['Id']; ?></td>
                    <td><?php echo $student['std_name']; ?></td>
                    <td><?php echo $student['std_roll']; ?></td>
                    <td><img style ="height:100px;" src="upload/<?php echo $student['std_image']; ?>"></td>
                    <td>
                        <a class ="btn btn-success" href="edit0.php?status=edit&&id=<?php echo $student['Id']; ?>">Edit</a>
                        <a class ="btn btn-warning" href="?status=delete&&id=<?php echo $student['Id']; ?>">Delete</a>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>