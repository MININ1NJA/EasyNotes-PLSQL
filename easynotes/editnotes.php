<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid" >
          <a class="navbar-brand" href="add_notes.html" style: margin-left: 50px>
            <img src="logo.png" alt="logo" width="50" height="50" class="d-inline-block align-text-center">
            EasyNotes
          </a>
          <ul class="nav">
            <li class="nav-item" >
              <a class="nav-link active" aria-current="page" href="/" style="color :#FFCC00">Home</a>
            </li>
            <li class="nav-item"style="display:flex" ><i class="fa fa-sticky-note" aria-hidden="true" style="color : #FFCC00;font-size:40px;"></i>
              <a class="nav-link" href="/show_notes.html"style="color : #FFCC00 ; margin-left: -10px;">Show Notes </a>
            </li>
            <li class="nav-item"style="display:flex" ><i class="fa fa-user" aria-hidden="true" style="color : #FFCC00;font-size:40px;"></i>
              <a class="nav-link" href="#"style="color : #FFCC00 ; margin-left: -10px;">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled"></a>
            </li>
          </ul> -->
        </div>
      </nav>
      <div style="  margin-top: 120px; display:flex;  justify-content:center; ">
      <form style="align-items:center; width: 60%;border: 1px solid black ; padding:5%; border-radius : 20px;" action="editnote_backend.php" method="post">
                  
            <?php
                include 'connection.php';
                $id= $_GET['id'];
                 $query="select * from add_notes where id=$id";
                 
                 $exc=mysqli_query($conn,$query);
             
                 while($res =mysqli_fetch_array($exc))
                 {
                
            ?> 

      <div class="mb-3">
            
        
        <input type="hidden" value="<?php echo $res['id'] ?>" name="nid">
          <label for="exampleInputEmail1" class="form-label " >Title</label>
          <input type="text" name="title" value="<?php echo $res['title'] ?>" class="form-control form-control-lg"  id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 1px solid black ;">
        </div>
        <div class="mb-3">
          <label for="textarea" class="form-label" >Notes</label>
          <textarea rows="12" name="paragraph" column = "10" class="form-control" id="exampleInputPassword1" style="border: 1px solid black ;"><?php echo $res['paragraph'] ?></textarea>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Edit and Submit</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php
                 }
        ?>
        
      </form>
      </div>


      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>