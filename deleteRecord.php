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
    print ("<p><a href='index.html'>Click here to go main page</a></p>");
    print ("<p><a href='admin.php'>Click here to view entire database</a></p>");
    print ("</body></html>");
?>