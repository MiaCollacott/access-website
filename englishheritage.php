<?php
$servername = "localhost";
$username = "username";
$password = "password";
// Connect to database
$mysqli = new mysqli("localhost", $username, $password, "access");

// fetch address data
$sql = "SELECT addresses.*, reviews.* FROM addresses JOIN reviews on reviews.locations_id=addresses.locations_id";
$result = $mysqli->query($sql);
// fetch review
#$review = "SELECT reviews.Review from reviews join addresses on reviews.locations_id = addresses.locations_id";
#$reviewresult = $mysqli->query($review);
$mysqli->close();
?>
<head>
<!--Visible on the page-->
    <link rel="stylesheet" href="neastylesheet01-05.css">
    <title>English Heritage Properties</title>
    <div class="topnav">
        <a href="neahtml01-05.html">Home</a>
        <a href="#about" onclick="show('popup')">About Us</a>
        <a href="contactus.php">Contact</a>
        <a href="submitreview.php">Submit A Review</a>
        <a class = "active" href="englishheritage.php">English Heritage Locations</a>
        <input type="text" placeholder="Search..">
    </div>
</head>
<body>
    <h1>English Heritage Properties</h1>
    <table>
        <tr>
            <th>Location</th>
            <th>Address</th>
            <th>URL</th>
            <th>Star Rating</th>
            <th>Community Input</th>
            <th>Is there a ramp?</th>
            <th>Is there a hearing loop?</th>
            <th>Is there step free access?</th>
        </tr>
        <?php while($rows=$result->fetch_assoc())
                {
        ?>
        <tr>
            <td><?php echo $rows['NAME'];?></td>
            <td><?php echo $rows['ADDRESS'];?></td>
            <td><?php echo $rows['URL'];?></td>
            <td><?php echo $rows['Stars'];?></td>
            <td><?php echo $rows['Review'];?></td>
            <td><?php echo $rows['ramp'];?></td>
            <td><?php echo $rows['HearingLoop'];?></td>
            <td><?php echo $rows['StepFree'];?></td>
        </tr>
        <?php
                }
            ?>
    </table>
</body>