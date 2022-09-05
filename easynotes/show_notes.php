<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show Notes | EasyNotes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <script>
        var request = new XMLHttpRequest();      
        request.open("GET","http://localhost:8080/easynotes_data/webresources/com.db.addnotes",true);
        
    
 request.onload = function(){
           
            var data= JSON.parse(this.response);
            var table =  document.getElementById("mytable");
      
         
            for(var i=0; i <data.length; i++){
                var row = table.insertRow();    
                var cell1 = row.insertCell();
                var cell2 = row.insertCell();
		var cell3 = row.insertCell();
                var cell4 = row.insertCell();
                var cell5 = row.insertCell();
                var a = document.createElement('a');
                    var link = document.createTextNode("This is link");
                    a.appendChild(link);
                    a.innerHTML = "Delete";
                    a.href = "delnote.jsp?noteid=" + data[i].id;
                    console.log(a);
		
		var b = document.createElement('a');
                    var link = document.createTextNode("This is link");
                    b.appendChild(link);
                    b.innerHTML = "Update";
                    b.href = "edit.jsp?id=" + data[i].id;
                    console.log(a);
		
            cell1.innerHTML = data[i].title;
            cell2.innerHTML= data[i].paragraph;
            cell3.innerHTML = data[i].date;
            cell4.appendChild(b);
            cell5.appendChild(a);
            }
        };
        request.send();
        
        </script>
        
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid" >
          <a class="navbar-brand" href="#" style: margin-left: 50px>
            <img src="logo.png" alt="logo" width="50" height="50" class="d-inline-block align-text-center">
            EasyNotes
          </a>
          <ul class="nav">
            <li class="nav-item" >
              <a class="nav-link active" aria-current="page" href="/easynotes/index.html" style="color :#FFCC00">Home</a>
            </li>
            <li class="nav-item"style="display:flex" ><i class="fa fa-sticky-note" aria-hidden="true" style="color : #FFCC00;font-size:40px;"></i>
              <a class="nav-link" href="/easynotes/add_notes.html"style="color : #FFCC00 ; margin-left: -10px;">Add Notes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled"></a>
            </li>
          </ul> -->
        </div>
      </nav>


      <div class="notes" style="margin-top:100px;align-items:center; width: 100%; padding:5%;">
        <table id="mytable" >
            <tr>
                <th>TITLE</th>
                <th>PARAGRAPH</th>
			          <th>DATE</th>
                <th colspan="2">ACTIONS</th>
           
            </tr>
            
            <?php
                include 'connection.php';
                 $query="call shownotes;";
                 
                 $exc=mysqli_query($conn,$query);
             
                 while($res =mysqli_fetch_array($exc))
                 {
                
            ?>

            <tr>
                  <td>
                  <?php echo $res['title'] ?> 
                 </td>
                 <td>
                  <?php echo $res['paragraph'] ?> 
                 </td>
                 <td>
                  <?php echo $res['date'] ?> 
                 </td>
                 <td>
                  <a href="editnotes.php?id=<?php echo $res['id'] ?> ">edit</a>
                  <a href="delete.php?id=<?php echo $res['id'] ?> ">delete</a>
                 </td>

            </tr>
                  <?php 
                        
                      }
                  ?>
        </table>
            </div>


      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>