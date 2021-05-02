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
        a:hover{ text-decoration: red underline; font-weight: bold; color: red; }
    </style>
</head>
<body>

<?php
    
    $idRecord = $_POST["idrecord"] ?? "";
    $query = "DELETE FROM reservations WHERE id =  '$idRecord';";
    
    if (!($database = mysqli_connect("localhost:3306", "root", "i36297815M@")))
    {
        die("<p>Could not connect to database </p></body></html>");
    }
    
    if (!mysqli_select_db($database, "examdb"))
    {
        die("<p>Could not open products database </p></body></html>");
    }
    
    // query products database
    if (!($result = mysqli_query($database, $query)))
    {
        print ("<p>Could not execute query!</p></body></html>");
        die(mysqli_error($database));
    }
    else
    {
        print ("<p>Query executed successfully record with id: " . $idRecord . " was deleted from database</p>" );
    }
    print ("<p><a href='index.html'>Click here to go main page</a></p>");
    print ("<p><a href='admin.php'>Click here to view entire database</a></p>");
    print ("</body></html>");
    mysqli_close($database);
    ?>