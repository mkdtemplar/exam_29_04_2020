<?php
    print ("<!DOCTYPE html>");
    print ("<html>");
    print ("<head>");
    print ("<meta charset='utf-8'>");
    print ("<title>Fuel Calculations</title>");
    print ("<style> a:hover{ text-decoration: red underline; font-weight: bold; color: red; } </style>");
    print ("</head><body>");
   
        $fname = $_POST["fname"] ?? "";
        $car = $_POST ["cars"] ?? "";
        $rdate = $_POST["rdate"] ?? "";
    
    
    $query = "INSERT INTO reservations  ( firstname, car, resdate )
                VALUES ( '$fname', '$car', '$rdate' )";
        
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
        mysqli_close($database);
        
        
?>
<h1>Inserted Information</h1>
<?php
    print ("<div>");
    print ("<p class='head'>The following information is saved in database</p>");
    print ("<p>Name: $fname</p>");
    print ("<p>Car: $car</p>");
    print ("<p>Date: $rdate</p>");
    print ("</div>");
    print ("</body></html>");
?>
