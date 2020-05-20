<!DOCTYPE html>
<?php
include 'conn.php';
session_start();
print_r($_SESSION);
?>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <meta charset="UTF8" />
    <meta name="author" content="Y." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin's Hotel Map</title>
    <style type="text/css">
        .container {
            background: #ffffff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            margin: 30px auto;
        }

        .jumbotron {
            background: white;
            background-size: cover;
            color: black;
        }




        body {
            padding-top: 5%;
        }

        h1 {
            text-indent: 0em;
            text-align: center;
        }
    </style>
    <h1><?php echo $_SESSION['username_admin'];?> 's Hotel</h1>
    <hr>
    <div class = "row">
        <div class = "col-md-8">
    <div class = "text-right">
        <a type = 'button' class = 'btn btn-primary' href="admin_addhotel.html">Add</a>
        <br>
    </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Hotel ID</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Hotel Address(i,j)</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "select * from hotel where admin='$_SESSION[username_admin]'");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['hotelcode'] ?></th>
                        <td><?php echo $row['hotelname'] ?></td>
                        <td><?php echo "( " . $row["addressi"] . "," . $row['addressj'] . " )"; ?></td>
                        <td><a href ="adminpage_edithotel.php?hotelcode=<?php echo $row['hotelcode'];?>" class = "btn btn-info">Edit</a></td>
                        <td><a href ="admin_removehotel.php?hotelcode=<?php echo $row['hotelcode'];?>" class = "btn btn-danger">Remove</a></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    </body>
    <div class="text-center">
        <a type='button' class='btn btn-primary' onClick='history.back()'>Go back</a>
    </div>

</html>