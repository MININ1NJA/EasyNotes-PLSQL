<?php
include 'connection.php';
$title = $_POST['title'];
$paragraph = $_POST['paragraph'];


$query="call addnote('$title','$paragraph');";
    if (mysqli_query($conn, $query))
            {
                ?>
                <script>
                alert('Notes Added Successfully');
                window.location.assign('show_notes.php')
                </script>
                <?php
            }
        else 
            {
                ?>
                <script>
                  alert('Notes Could Not Added');
                  window.location.assign('add_notes.html')
                </script>
                  <?php
            }

?>

