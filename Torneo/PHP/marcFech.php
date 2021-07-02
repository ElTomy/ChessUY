<?php
if(isset($_POST['reserv'])) {
    $reserv = $_POST['reserv'];
}
echo "<style>";
sort($reserv);
if(isset($reserv[0])) {
    echo "#" . $reserv[0] . " ";
    echo "{background-color: red; border-radius: 10px;}";
}
if(isset($reserv[1])) {
    echo "#" . $reserv[1] . " ";
    echo "{background-color: orange; border-radius: 10px;}";
}
if(isset($reserv[2])) {
    echo "#" . $reserv[2] . " ";
    echo "{background-color: green; border-radius: 10px;}";
}
echo "</style>";
?>