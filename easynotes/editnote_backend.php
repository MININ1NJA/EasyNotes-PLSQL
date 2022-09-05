<?php
include 'connection.php';
$id = $_POST['nid'];
$title = $_POST['title'];
$paragraph = $_POST['paragraph'];


$query="call editnotes('$id', '$title' , '$paragraph');";

    if (mysqli_query($conn, $query))
            {
                ?>
                <script>
                alert('Notes Updated Successfully');
                window.location.assign('show_notes.php')
                </script>
                <?php
            }
        else 
            {
                ?>
                <script>
                  alert('Notes Could Not Update');
                  window.location.assign('add_notes.html')
                </script>
                  <?php
            }


?>

