<?php
include 'connection.php';
$id = $_GET['id'];


$query="call deletenotes('$id');";
    if (mysqli_query($conn, $query))
            {
                ?>
                <script>
                alert('Notes Deleted Successfully');
                window.location.assign('show_notes.php')
                </script>
                <?php
            }
        else 
            {
                ?>
                <script>
                  alert('Notes Could Not Delete');
                  window.location.assign('add_notes.html')
                </script>
                  <?php
            }

?>

