<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="neastylesheet01-05.css">
        
    </div>
    <?php 
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "contactform";
    
    // Create connection
    $conn = new mysqli($servername, 
        $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " 
            . $conn->connect_error);
    }
    
    
   
    ?>
    </head>
    <body>
    <div class="topnav">
        <a href="neahtml01-05.html">Home</a>
        <a href="#about" onclick="show('popup')">About Us</a>
        <a class = "active" href="contactus.php">Contact</a>
        <a href="#submit">Submit A Location</a>
        <a href="englishheritage.php">English Heritage Locations</a>
        <input type="text" placeholder="Search..">
        <h1>Questions? Concerns? Let Us Know!</h1>
        <form method="POST" class="contactbox" method="POST">
            <label for="name">What's your name?</label>
            <br>
            <br>
            <input type="text" id="name" name="name">
            <br>
            <br>
            <br>
            <label for="email">Do you have an email we can get back to you on?</label>
            <br>
            <input type="email" id="email" name="email">
            <br>
            <label for="message">What's your message? <br><textarea cols="50" rows="10" required id="message" name="message"></textarea></label>
            <br>
            <input type="submit" id="submit" value="Send">
            <?php 
            // Request data from contactform
            $name = $_REQUEST['name']?? 'not entered';
            $email = $_REQUEST['email']?? 'not entered';
            $message = $_REQUEST['message']?? 'not entered';
            //Insert into the table
            $sql = "INSERT INTO messages (Name, Email, Message) VALUES ('$name', '$email', '$message')";
            if ($conn->query($sql) === TRUE) {
                echo "record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
        </form>
    </body>
</html>