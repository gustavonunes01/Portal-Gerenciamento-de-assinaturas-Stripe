<?php



?>



<div class="uk-container">

    <h2>Selecione a posição</h2><br>

</div>



<div class="uk-container">

    <div class="uk-child-width-1-5 uk-grid-small uk-grid-match" uk-grid>



        <?php
        $posicoes = array (

            "sc"  => array("PH01", "PH02", "PH03", "PH04", "PH05", "PH06", "PH07", "PH08", "PH09", "PH10", "PH11", "PH12", "PH13", "PH14", "PH15", "PH16", "PH17", "PH18", "PH19", "PH20", "PH21", "PH22", "PH23", "PH24", "PH25", "PH26", "PH27", "PH28", "PH29", "PH30", "PH31", "PH32", "PH33", "PH34", "PH35", "PH36", "PH37", "PH38", "PH39", "PH40"),

            "ar" => array("PH01", "PH02", "PH03", "PH04", "PH05", "PH06", "PH07", "PH08", "PH09", "PH10", "PH11", "PH12", "PH13", "PH14", "PH15", "PH16", "PH17", "PH18", "PH19", "PH20", "PH21", "PH22", "PH23", "PH24", "PH25", "PH26", "PH27", "PH28", "PH29", "PH30", "PH31", "PH32", "PH33", "PH34", "PH35", "PH36", "PH37", "PH38", "PH39", "PH40"),

            "in" => array("PH01", "PH02", "PH03", "PH04", "PH05", "PH06", "PH07", "PH08", "PH09", "PH10", "PH11", "PH12", "PH13", "PH14", "PH15", "PH16")

        );

        $unit = 'sc';

        $getposicoes = $posicoes[$unit];





        //echo "<pre>"; print_r($getposicoes); echo "</pre>";





        foreach ($getposicoes as $posicao) :

            ?>

        <div>

            <div class="uk-card uk-card-secondary uk-card-body" style="border-radius:20px;">

                <svg  xmlns="http://www.w3.org/2000/svg"  width="36"  height="36"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-armchair"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a2 2 0 0 1 2 2v2h10v-2a2 2 0 1 1 4 0v4a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-4a2 2 0 0 1 2 -2z" /><path d="M5 11v-5a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v5" /><path d="M6 19v2" /><path d="M18 19v2" /></svg>

                <h3 class="uk-card-title"><?php echo $posicao; ?></h3>

                <a class="uk-button" href="reservar-2.php?unit=sc&ph=<?php echo $posicao; ?>" style="background-color: #95398E; color: white !important; border-radius: 100px;">Selecionar</a>

            </div>

        </div>

<?php

endforeach;



?>
