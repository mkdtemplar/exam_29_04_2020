<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Search results</title>
    <style>
        div {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        label, datalist, list, option {
            width: 8em;
            float: left;
        }
        table {
            background-color: lightblue;
            border-collapse: collapse;
            border: 1px solid gray;
        }
        
        th, td {
            padding: 5px;
            border: 1px solid gray;
        }
        
        tr:nth-child(even) {
            background-color: lightcoral;
        }
        
        tr:first-child {
            background-color: lightgreen;
        }
        h1 {
            font-weight: bold;
            color: blue;
            text-align: center;
            text-shadow: 5px 5px 10px red;
        }
    </style>
</head>
<body>
<?php
    $query = "SELECT * FROM reservations";
    
    if (!($database = mysqli_connect("localhost:3306", "root", "i36297815M@"))) {
        die("<p>Could not connect to database </p></body></html>");
    }
    
    // open products database
    if (!mysqli_select_db($database, "examdb")) {
        die("<p>Could not open products database </p></body></html>");
    }
    
    // query products database
    if (!($result = mysqli_query($database, $query))) {
        print ("<p>Could not execute query!</p></body></html>");
        die(mysqli_error($database));
    }
?>
<h1>Database content</h1>
<table>
    <caption>Information stored in database table  reservations</caption>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Car</th>
        <th>Reservation date</th>
        
    </tr>
    <?php
        for ($i = 0; $row = mysqli_fetch_row($result); $i++)
        {
            print ("<tr>");
            foreach ($row as $key => $value)
                print ("<td>$value</td>");
            print ("</tr>");
        }
        mysqli_close($database);
    ?>
</table>
</body>
</html>
    <?php
        print ("<!DOCTYPE html>");
        print ("<html>");
        print ("<head>");
        print ("<meta charset='utf-8'>");
        print ("<title>Fuel Calculations</title>");
        print ("<style> a:hover{ text-decoration: red underline; font-weight: bold; color: red; } </style>");
        print ("</head><body>");
            print ("<form action=admin.php method=post>");
            print ("<div><label>Enter Id to delete:</label><input type=number name=idrecord></div>");
            print ("<div><label>Delete:</label><input type=submit value=Delete record name=deleterecord></div>");
            print (" </form>");
            $idRecord = $_POST["idrecord"] ?? "";
            $query1 = "DELETE FROM reservations WHERE id =  '$idRecord';";
            if (!($database = mysqli_connect("localhost:3306", "root", "i36297815M@"))) {
                die("<p>Could not connect to database </p></body></html>");
            }
    
            // open products database
            if (!mysqli_select_db($database, "examdb")) {
                die("<p>Could not open examdb database </p></body></html>");
            }
    
            // query products database
            if (!($result1 = mysqli_query($database, $query1))) {
                print ("<p>Could not execute query!</p></body></html>");
                die(mysqli_error($database));
            }
            print ("</body></html>");
    ?>
<?php print ("<p><a href='index.html'>Click here to go main page</a></p>"); ?>


