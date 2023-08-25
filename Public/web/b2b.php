<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title> Site B2B</title>
</head>

<body>
        <h1>Bienvenue sur le site B2B</h1>
        <hr><br>
        <h2> Output DB</h2>

<?php
        $query ='SELECT * FROM stock;';
                try
                {
                        $db = new PDO('mysql:host=51.91.248.156;port=5000;dbname=wt','root','password');
                        $answer = $db->query($query);
                        $output = "<table>";
                        foreach(($answer->fetchAll(PDO::FETCH_ASSOC)) as $key => $var) {
                                if($key===0) {
                                        $output .= '<tr>';
                                        foreach($var as $col => $val) {
                                                $output .= "<td><strong>" . $col . '</strong></td>';
                                                }
                                        $output .= '</tr>';
                                        foreach($var as $col => $val) {
                                                $output .= '<td>' . $val . '</td>';
                                                }
                                        $output .= '</tr>';
                                        }
                                else {
                                        $output .= '<tr>';
                                        foreach($var as $col => $val) {
                                                $output .= '<td>' . $val . '</td>';
                                                        }
                                        $output .= '</tr>';
                                        }
                               }
                                        $output .= '</table>';
                                        echo $output;

                                        $db = null;
                       }

                       catch (PDOException $e) {
                        print "Erreur !: " . $e->getMessage() . "<br/>";
                                        die();
                  }
                                echo '<hr><br>';?>

</body>
</html>