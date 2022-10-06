<?php
    require_once("funzioni.php");
    require_once("token.php");
    require_once("funzioniTelegram.php");

    $ngrokUrl = "https://26cb-82-58-48-253.eu.ngrok.io/telegram/index.php"; # link ngrok
    $update = file_get_contents('php://input');
    $update = json_decode($update, true);

    $utente = isset($update['message']['chat']['first_name']) ? $update['message']['chat']['first_name'] : null; # Cerco il nome dell'utente che usa telegram
    $chatId = isset($update['message']['chat']['id']) ? $update['message']['chat']['id'] : null; # Cerco l'id della chat
    $text = isset($update['message']['text']) ? $update['message']['text'] : null; # Cerco il testo della chat

    try{
        $bot = new telegramBot($token); # creo l'oggetto bot dove contiene delle funzioni

/*  FUNZIONI DI BASE DI TELEGRAM    */

        $me = $bot->getMe();
        $updates = $bot->getUpdates();
        $setWebhook = $bot->setWebhook($ngrokUrl);
        $deleteWebHook = $bot->deleteWebhook();

        //var_dump($setWebhook);
        //var_dump($bot->sendMessage($chatId, "patrick bateman"));
        //var_dump($me);
        //var_dump($updates);
        //var_dump($deleteWebHook);
    }catch(ErrorException $e){
        echo $e->getMessage();
    }

    $admin = 636181395; # Id dell'admin della chat che mi consente di cambiare da amministratore a cliente
    if($chatId == $admin){ # Se il chat id è uguale all'admin allra sono l'admin del bot
        switch($text){
            case "/start":{ # case che fa scegliere se visualizzare, inserire, modificare o eliminare gli immobili
                $replyMarkup = json_encode( # tipo di telegram (array di array) per mandare il contenuto dei bottoni in formato json
                    [
                        'keyboard' => [
                            ['Immobili🏘', 'Inserisci📲'],
                            ['Modifica✍🏻', 'Elimina❌']
                        ],
        
                    'resize_keyboard' => true
                ]);
                $bot->sendMessageStart($chatId,"Benvenuto ".$utente."! sei nella funzione di admin, per maggiori info digita /help",$replyMarkup); # manda il messaggio di benvenuto con i bottoni
                break;
            }
            case "Immobili🏘":{ # Case che fa visualizzare tutti gli immobili
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "SELECT * FROM immobile";
                $rs = $db->query($sql);
                if($rs->num_rows > 0){
                    while($row = $rs-> fetch_assoc()){
                        $id = $row['id'];
                        $nome = $row['nome'];
                        $via = $row['via'];
                        $civico = $row['civico'];
                        $metratura = $row['metratura'];
                        $piano = $row['piano'];
                        $locali = $row['locali'];
                        $idZona = $row['idZona'];
                        $idTipologia = $row['idTipologia'];

                        $immobile = "Nome: ".$nome."\nVia: ".$via."\nCivico: ".$civico."\nMetratura: ".$metratura."\nPiano: ".$piano."\nLocali: ".$locali."\nZona: ".$idZona."\nTipo: ".$idTipologia."\n";
                        $bot->sendMessage($chatId, $immobile); # dopo aver salvato in una variabile tutte le info dell'immobile mando il testo alla funione sendMessage, cosi il bot mi darà le informazioni dell'immobile
                    }
                }
                break;
            }
            // gli altri case con inserisci, modifica ed elimina non so come farli
            case "/help":{ # case help che ti dice cosa puo fare il bot
                $bot->sendMessage($chatId,"Da qui puoi fare eseguire le funzioni di amministratore cioè visualizzare, modificare, inserire ed eliminare gli immobili"); # Con la funzione sendMessage informo l'utente di quello che puo fare
                break;
            }
        }
    }else{
        switch($text){
            case "/start":{
                $replyMarkup = json_encode(
                    [
                        'keyboard' => [
                            ['Compra💸', 'Vendi💼']
                        ],
        
                    'resize_keyboard' => true
                ]);
                $bot->sendMessageStart($chatId,"Benvenuto ".$utente."! sei nella funzione di acquirente / venditore , per maggiori info digita /help",$replyMarkup); # manda il messaggio di benvenuto con i bottoni
            break;
            }
            case 'Vendi💼':{
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "DELETE FROM immobile, possiede WHERE immobili.id = immobile.$immobile AND possiede.id = immobile.id";
                $rs = $db->query($sql);
                break;
            }
            case "Compra💸":{
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "SELECT * FROM immobile";
                $rs = $db->query($sql);
                if($rs->num_rows > 0){
                    while($row = $rs-> fetch_assoc()){
                        $id = $row['id'];
                        $nome = $row['nome'];
                        $via = $row['via'];
                        $civico = $row['civico'];
                        $metratura = $row['metratura'];
                        $piano = $row['piano'];
                        $locali = $row['locali'];
                        $idZona = $row['idZona'];
                        $idTipologia = $row['idTipologia'];

                        $immobile = "Nome: ".$nome."\nVia: ".$via."\nCivico: ".$civico."\nMetratura: ".$metratura."\nPiano: ".$piano."\nLocali: ".$locali."\nZona: ".$idZona."\nTipo: ".$idTipologia."\n";
                        $keyboard = array(); # creo una variabile tipo array
                        $keyboard[] = array($nome); # riempio la variabile array con il nome dell'immobile
                        $replyMarkup = array( # dico alla variabile che il parametro keyboard deve contere i nomi degli immobili
                            'keyboard' => $keyboard,
                            'resize_keyboard' => true,
                        );
                        $json = json_encode($replyMarkup); # lo trasformo in json
                        $bot->sendMessage($chatId, $immobile); # mando tutte le info dell'immobile
                    }
                    $bot->sendMessageStart($chatId, "Che immobile vuoi comprare?", $json); # mando i bottoni che contengono i nomi dell'immobile
                }
                break;
            }
            case "/help":{
                $bot->sendMessage($chatId,"Da qui puoi fare acquisti e vendite degli immobili"); # Con la funzione sendMessage informo l'utente di quello che puo fare
                break;
            }
        }
    }

?>
