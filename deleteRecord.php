<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "refresh" content = "120"/>
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
        a:hover{ text-decoration: red underline; font-weight: bold; color: red; }
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
        die("<p>Could not open examdb database </p></body></html>");
    }
    
    // query products database
    if (!($result = mysqli_query($database, $query))) {
        print ("<p>Could not execute query!</p></body></html>");
        die(mysqli_error($database));
    }
    print ("<h1>Database content</h1><table><caption>Information stored in database table  reservations</caption>");
    print ("<tr><th>ID</th> <th>First Name</th> <th>Car</th><th>Reservation date</th></tr>");
    for ($i = 0; $row = mysqli_fetch_row($result); $i++)
    {
        print ("<tr>");
        foreach ($row as $key => $value)
            print ("<td>$value</td>");
        print ("</tr>");
    }
    
    print ("<form action=deleteRecord.php method=post>");
    print ("<div><label>Enter Id to delete:</label><input type=number name=idrecord></div>");
    print ("<div><label>Go to Delete record page:</label><input type=submit value=Delete record name=deleterecord></div>");
    print (" </form>");
    $idRecord = $_POST["idrecord"] ?? "";
    $query1 = "DELETE FROM reservations WHERE id =  '$idRecord';";
    if (!($result1 = mysqli_query($database, $query1))) {
        print ("<p>Could not execute query!</p></body></html>");
        die(mysqli_error($database));
    }
    
    print ("<p><a href='index.html'>Click here to go main page</a></p>");
    print ("<p><a href='admin.php'>Click here to view entire database</a></p>");
    print ("</body></html>");
    mysqli_close($database);
    ?>