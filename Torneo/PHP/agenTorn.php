<?php
if(isset($_POST['_month']) && isset($_POST['_year'])) {
    $month = $_POST['_month'] + 1;
    $year = $_POST['_year'];
    $mes = date('m', mktime(0, 0, 0, $month, 10));
    $mesLetr = date('F', mktime(0, 0, 0, $month, 10));
    $cantdias = cal_days_in_month(CAL_GREGORIAN, $month, $year);
} else {
    $mes = date('m');
    $mesLetr = date('F');
    $month = date('m');
    $year = date('Y');
    $cantdias = date('t');
}
echo "<div style='width: 100%; height: 10%; display: flex;'>";
echo "<button style='width: 10%;' onclick='resMes()'> < </button>";
echo "<p style='width: 90%; text-align: center;'>" . $year . " - " . $mesLetr . "</p>";
echo "<button style='width: 10%;' onclick='sumMes()'> > </button>";
echo "</div>";
echo "<div style='width: 100%; height: 90%;'>";
echo "<table style='height: 100%; width: 100%;'> <tr>";
echo "<th> L </th> <th> M </th> <th> M </th> <th> J </th> <th> V </th> <th> S </th> <th> D </th> </tr>";
for ($h=1;$h<=7;$h++) {
    if ($h == 1) {
        echo "<tr>";
    }
    if (date("N", mktime(0,0,0,$month,1,$year)) == $h){
        for ($i=1;$i<=$cantdias;$i++) {
            $dia = substr("00{$i}", -2);
            echo "<td style='text-align: center; cursor: pointer;' id='fech" . $year . $mes . $dia . "' onclick='guarFech(this.id)'>" . $i . "</td>";
            if ($h%7 == 0) {
                echo "</tr> <tr>";
            }
            $h = $h + 1;
        }
    } else {
        echo "<td> </td>";
    }
    if ($h == 7) {
        echo "</tr>";
    }
}
echo "</div>";
?>