<!doctype HTML>
<html>
    <head>
        <title>Tagurpidi - idiprugaT</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Tagurpidi - idiprugaT</h1>
        <form id="vorm" method="POST" action="KodunePHP1.php">
            <table>
                <tr>
                    <td>Sisend</td>
                    <td><input type="text" id="sisend" name="sisend"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><p>Väljund:</p></td>
                </tr>
                <tr>
                    <td>
                        <h1>
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    $value = htmlspecialchars($_POST["sisend"]);
                                    if (strlen($value)>0){
                                        $sisendtekst = htmlspecialchars($_POST["sisend"]);
                                    for ($i=0; $i <=strlen($sisendtekst); $i++) {
                                        $pikkus = strlen($sisendtekst);
                                        $loendur = $pikkus - ($i+1);
                                        if($loendur >=0){
                                            $tekst[$i] = $sisendtekst[$loendur];
                                        }else {
                                            echo $sisendtekst." - ";
                                            echo implode($tekst);
                                            }
                                    }
                                    }else {
                                        echo "Pane ikka mingi tekst ka...";
                                        }
                                }
                            ?>
                        </h1>
                    </td>
                </tr>
            </table>
            <p><button type="submit">Pööra</button></p>
        </form>
    </body>
</html>
