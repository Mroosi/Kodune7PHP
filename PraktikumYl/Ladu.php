<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $andmebaas = file_get_contents('andmebaas.txt');
    $andmebaas = json_decode($andmebaas, true);
    
    if(isset($_POST['delete'])){
        //kustutamine
        $delete = intval($_POST['delete']);
        unset($andmebaas[$delete]);
    }else{
    
    $nimetus = $_POST['nimetus'];
    $kogus = intval( $_POST['kogus'] );
    if ( $nimetus == '' || $kogus < 1 ){
        echo 'Vigased väärtused';
        exit;
    }
    
    $andmebaas[] = array('nimetus'=>$nimetus, 'kogus'=>$kogus);
    }
    $andmebaas = json_encode($andmebaas);
    file_put_contents('andmebaas.txt', $andmebaas);
    header('Location: Ladu.php');
    exit;
    /*644*/
}



?><!doctype HTML>
<html>

<head>
    <title>Laoprogramm</title>
    <meta charset="utf-8">

    <style>
        #lisa-vorm {
            display: none;
        }
    </style>

</head>

<body>

    <h1>Laoprogramm</h1>

    <p id="kuva-nupp">
        <button type="button">Kuva lisamise vorm</button>
    </p>

    <form id="lisa-vorm" method="POST" action="Ladu.php">

        <p id="peida-nupp">
            <button type="button">Peida lisamise vorm</button>
        </p>

        <table>
            <tr>
                <td>Nimetus</td>
                <td>
                    <input type="text" id="nimetus" name="nimetus">
                </td>
            </tr>
            <tr>
                <td>Kogus</td>
                <td>
                    <input type="number" id="kogus" name="kogus">
                </td>
            </tr>
        </table>

        <p>
            <button type="submit">Lisa kirje</button>
        </p>

    </form>

    <table id="ladu" border="1">
        <thead>
            <tr>
                <th>Nimetus</th>
                <th>Kogus</th>
                <th>Tegevused</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $andmebaas = file_get_contents('andmebaas.txt');
            $andmebaas = json_decode($andmebaas, true);
            ?>
             <?php foreach ($andmebaas as $index => $rida ): ?>
              <tr>
                   <td>
                        <?= htmlspecialchars($rida['nimetus']); ?>
                    </td>
                     <td>
                        <?= htmlspecialchars($rida['kogus']); ?>
                    </td>
                    <td>
                        <form method="post" action="Ladu.php">
                            <input type="hidden" name="delete" value="<?= $index; ?>" >
                             <button type="submit">Kustuta rida </button>
                        
                    </td>
               </tr>
              <?php endforeach; ?>
        </tbody>
    </table>

    <script src="ladu.js"></script>
</body>

</html>