<?php
$servername = "localhost";
$username = "username";
$password = "password";
// Connect to database
$mysqli = new mysqli("localhost", $username, $password, "access");

// fetch data
$sql = "SELECT locations_id,NAME FROM addresses";
$result = $mysqli->query($sql);


//set error variables
$starsError = $reviewError = '';
$review = $location = $bathroom = $stars = $stepfree = $stepfree = $ramp = $lift = $hearingloop = $seating = '';
?>

<head>
    <link rel="stylesheet" href="neastylesheet01-05.css">
    <style>.error { color: crimson;}</style>

    <title>English Heritage Properties</title>
    <div class="topnav">
        <a href="neahtml01-05.html">Home</a>
        <a href="#about" onclick="show('popup')">About Us</a>
        <a href="contactus.php">Contact</a>
        <a class = "active" href="submitreview.php">Submit A Review</a>
        <a href="englishheritage.php">English Heritage Locations</a>
        <input type="text" placeholder="Search..">
    </div>
</head>
<body>
<h1>Submit A Review To Us!</h1>
        <form class="contactbox" method="POST" id="submitLocation">
            <span class="error">* required field</span>
  
            <!-- drop down to select location to review -->
            <label for="selectLocation">Select the location from this list (visit a different page to submit a location): </label>
            <!-- <input type="search" id="selectLocation"> -->
            <select name="locations">
                <?php
                    while ($row = $result->fetch_assoc()) 
                        {
                            echo '<option value=" '.$row['locations_id'].' "> '.$row['NAME'].' </option>';
                        }
                ?>
            </select>
            <br>
            <!-- star rating -->
            <br>
            <!--<fieldset>-->
                <label for="selectStars">How many stars would you rate this location?</label>
                <br>
                <input type="radio" id="select1" name="selectStars">
                <label for="select1">1</label>
                <input type="radio" id="select2" name="selectStars">
                <label for="select2">2</label>
                <input type="radio" id="select3" name="selectStars">
                <label for="select3">3</label>
                <input type="radio" id="select4" name="selectStars">
                <label for="select4">4</label>
                <input type="radio" id="select5" name="selectStars">
                <label for="select5">5</label>
                <span class="error">* <?php echo $starsError;?></span>
            <!--</fieldset>-->
            <br>
            <!-- enter the text review -->

            <label for="enterReview">Enter Your Review:</label>
            <textarea cols="50" rows="10" required name="enterReview" form="submitLocation"></textarea>
            <br>
            <span class="error">* <?php echo $reviewError;?></span>
            <br>
            <input type="checkbox" id="stepFree" name="stepFree" value="Y">
            <label for="stepFree"> Step free</label><br>
            <input type="checkbox" id="ramp" name="ramp" value="Y">
            <label for="ramp"> Ramp</label>
            <input type="checkbox" id="lift" name="lift" value="Y">
            <label for="lift"> Lift</label>
            <input type="checkbox" id="hearingLoop" name="hearingLoop" value="Y">
            <label for="hearingLoop"> Hearing Loop</label>
            <input type="checkbox" id="seating" name="seating" value="Y">
            <label for="seating"> Seating</label>
            <br>
            <input type="checkbox" id="accessibleBathroom" name="accessibleBathroom" value="Y">
            <label for="accessibleBathroom"> Accessible bathroom (no payment needed)</label>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if (isset ($_POST['submit'])) {
            $location = $_REQUEST['locations'];
                if (empty($location)) {
                    echo "data is empty";
                } else {
                    echo $location;
                }
                $stars = $_REQUEST['selectStars']?? '0';
                $review = $_REQUEST['enterReview']?? 'N';
                $stepfree = $_REQUEST['stepFree']?? 'N';
                $ramp = $_REQUEST['ramp']?? 'N';
                $lift = $_REQUEST['lift']?? 'N';
                $hearingloop = $_REQUEST['hearingLoop']?? 'N';
                $seating = $_REQUEST['feature5']?? 'N';
                $bathroom = $_REQUEST['feature6']?? 'N';
        }
       
    
?>
    
        <?php 
         if (isset ($_POST['submit'])) {
            $sql = "INSERT into reviews (locations_id, Review, Stars, Bathroom, HearingLoop, StepFree, ramp, seating, lift) VALUES  ('$location','$review', '$stars', '$bathroom', '$hearingloop', '$stepfree', '$ramp', '$seating', '$lift')";
            if(mysqli_query($mysqli, $sql)){
                echo "<h3>data stored in a database successfully." 
                    . " Please browse your localhost php my admin" 
                    . " to view the updated data</h3>"; 
    
            } else{
                echo "ERROR: Hush! Sorry $sql. " 
                    . mysqli_error($mysqli);
            }
            
            // Close connection
            $mysqli->close();
        }
        ?>
</body>