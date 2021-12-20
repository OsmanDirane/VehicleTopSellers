<?php
include '../php/header.php';

?>
<!-- Displays Type of item as well as the navigation -->
   <h2>Sedans</h2>
   <div class="navigation">
    <ul class="nav">
        <li><h3><a href="index.php">Suv</a></h3></li>
        <li><h3><a href="sedan.php">Sedan</a></h3></li>
        <li><h3><a href="truck.php">Trucks</a></h3></li>
    </ul>
    <a id="adding" href="addsedan.php">Add New Sedan</a>
    </div>
    <?php

// result value holds the mysql query that selects all items from suv table
$result = mysqli_query($con,"SELECT * FROM sedan ORDER BY PRICE DESC");

echo "<table id='points' border='1'>
<tr>
<th>Code</th>
<th>Model</th>
<th>Price</th>
</tr>";
// Uses row value to get the array result and prints the data into the table 
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['code'] . "</td>";
echo "<td>" . $row['model'] . "</td>";
echo "<td> $" . $row['price'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>


