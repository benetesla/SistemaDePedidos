<html>
    <body>
        <table border="0" cellpading= "3">
            <tr>
                <td bgcolor="#cccccc" align="center" colspan="2">
                    <b>Distancia</b>
                </td>
                <td bgcolor="#cccccc" align="center">
                    <b>Frete</b>
                </td>
            </tr>
            <?php
            $distancia = 50;
            while ($distancia <=250){
                echo "<tr> \n <td align=\"right\">$distancia</td> \n";
                echo "<td align='right'>$distancia / 10</td> \n";
                $distancia += 50;
            }
            ?>
        </table>
    </body>
</html>