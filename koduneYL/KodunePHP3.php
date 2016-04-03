<?php
    $autod= array(
            array('mark'=>'Jeep', 'tootmisaasta'=>1995, 'varv'=>'hall', 'colour'=>'Gray' ),
            array('mark'=>'Peugeot', 'tootmisaasta'=>2005, 'varv'=>'sinine', 'colour'=>'DeepSkyBlue' ),
            array('mark'=>'Mazda', 'tootmisaasta'=>2015, 'varv'=>'punane', 'colour'=>'DarkRed' ),
            array('mark'=>'Volga', 'tootmisaasta'=>1970, 'varv'=>'roheline','colour'=>'ForestGreen' )
            );
    $pikkus = count($autod);
        for ($i=0; $i <$pikkus ; $i++) {
            include 'mass.html';
        }
?>
