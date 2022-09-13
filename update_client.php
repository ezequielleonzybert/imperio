<?php

$sql = "SELECT x,y FROM players WHERE name='$name'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc())
{
    $x = $row["x"];
    $y = $row["y"];
}

echo '<input type="hidden" id="name" value="' . $name . '">';
echo '<input type="hidden" id="x" value="' . $x . '">';
echo '<input type="hidden" id="y" value="' . $y . '">';