<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Parking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center" id="header">
                   <h1> Parking Lot Management System</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center mb-">
                    <h2 class="register">Registration Form</h2>
                    <form action="save.php" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="owner">Vehicle Owner Name:</span>
                        </div>
                        <input type="text" name="owner_name" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Vehicle Name:</span>
                        </div>
                        <input type="text" name="vehicle_name" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Vehicle Number:</span>
                        </div>
                        <input type="text" name="vehicle_number" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Entry Date:</span>
                        </div>
                        <input type="date" name="entry_date" class="form-control">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Exit Date:</span>
                        </div>
                        <input type="date" name="exit_date" class="form-control">
                    </div>
                   <input type="submit" onclick="click()" class="btn btn-primary mt-3">
                   </form>
                </div>
               
                <div class="col-md-6">
                    <img src="images/car.png" class="car" style="width: 650px; height: 250px;  200px;" alt="car picture">
                </div>
            </div>
        </div> 
             
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="register1">All Vehicle Records</h2>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <div class="input-group">
                       <div class="input-group-prepend">
                           <span class="input-group-text" >Search</span>
                       </div>
                        <input type="text" class="form-control" onkeyup="search()" id="text" placeholder="Search Vehicle Details">
                   </div>
                   
                <table class="table table-striped" id="table" >
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "parking_project") or die("connection failed!");
                    $sql = "select * from vehicle_info";
                    $result = mysqli_query($conn, $sql) or die("Query Failed!");
                    if(mysqli_num_rows($result)>0){
                ?>
                        <thead>
                        <tr>
                            <th>Owner Name</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Number</th>
                            <th>Entry Date</th>
                            <th>Exit Date</th>
                            <th>Delete Record</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  while($row = mysqli_fetch_assoc($result)){
                        ?>                       
                        <tr>
                            <td><?php echo $row['Owner_name']; ?></td>
                            <td><?php echo $row['Vehicle_name']; ?></td>
                            <td> <?php echo $row['Vehicle_number']; ?> </td>
                            <td> <?php echo $row['Entry_date']; ?> </td>
                            <td> <?php echo $row['Exit_date']; ?></td>
                            <td><a href="delete-inline.php?Vehicle_name=<?php echo $row['Vehicle_name']; ?>">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php 
                }else{
                    echo "No Record Found";
                }
            ?>
               </div>
            </div>
        </div>
    </section>
    <script>
        const search = () => {
        let input = document.getElementById("text").value.toUpperCase();
       // console.log(input);
        let table = document.getElementById("table");
        let tr = table.getElementsByTagName("tr");
            for(var i = 0; i<tr.length; i++){
                td = tr[i].getElementsByTagName("td")[0];
            if(td){
                let textvalue = td.textContent;
                if(textvalue.toUpperCase().indexOf(input) > -1){
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>
</body>
</html>