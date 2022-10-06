# BOT TELEGRAM DI SIMONE ACUTI
### ***composizione del progetto:***
- index.php
- token.php
- funzioni.php
- funzioniTelegram.php
- fetchFunzioni.php

------------


### index.php:
Nella prima parte chiedo i file che mi servono e ottengo il testo che si manda, id della chat e il nome dell utente.

    require_once("funzioni.php");
    require_once("token.php");
    require_once("funzioniTelegram.php");
    $ngrokUrl = "link";``
    $update = file_get_contents('php://input');
    $update = json_decode($update, true);
    $utente = isset($update['message']['chat']['first_name']) ? $update['message']         ['chat']['first_name'] : null;
    $chatId = isset($update['message']['chat']['id']) ? $update['message']['chat']['id'] :      null;
    $text = isset($update['message']['text']) ? $update['message']['text'] : null;
 Nella seconda parte invece creo l oggetto bot che conterrà tutte le funzioni:
 
 ` $bot = new telegramBot($token);`
 
 Nella terza parte creo una variabile che contiene l id della chat che mi consente di muovermi all interno dei case:
`$admin = 636181395; if($chatId == $admin){ switch($text){`

    case "/start":{
                    $replyMarkup = json_encode(
                        [
                            'keyboard' => [
                                ['Immobili🏘', 'Inserisci📲'],
                                ['Modifica✍🏻', 'Elimina❌']
                            ],
                        'resize_keyboard' => true
                    ]);
                    $bot->sendMessageStart($chatId,"Benvenuto ".$utente."! sei nella funzione di admin, per maggiori info digita /help",$replyMarkup);
                    break;
    }

    case "Immobili🏘":{
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
                            $bot->sendMessage($chatId, $immobile);
                        }
                    }
                    break;
    }
	case "/help":{ # case help che ti dice cosa puo fare il bot
                $bot->sendMessage($chatId,"Da qui puoi fare eseguire le funzioni di amministratore cioè visualizzare, modificare, inserire ed eliminare gli immobili"); # Con la funzione sendMessage informo l'utente di quello che puo fare
                break;
            }
Nella quarta parte invece se l'id della chat è != all admin allora va nell else dove ce uno switch con le funzioni per il cliente:

    switch($text){
                case "/start":{
                    $replyMarkup = json_encode(
                        [
                            'keyboard' => [
                                ['Compra💸', 'Vendi💼']
                            ],
                        'resize_keyboard' => true
                    ]);
                    $bot->sendMessageStart($chatId,"Benvenuto ".$utente."! sei nella funzione di acquirente / venditore , per maggiori info digita /help",$replyMarkup);
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
                            $keyboard = array();
                            $keyboard[ ] = array($nome);
                            $replyMarkup = array(
                                'keyboard' => $keyboard,
                                'resize_keyboard' => true,
                            );
                            $json = json_encode($replyMarkup);
                            $bot->sendMessage($chatId, $immobile);
                        }
                        $bot->sendMessageStart($chatId, "Che immobile vuoi comprare?", $json);
                    }
                    break;
                }
    }

------------

### token.php:
Nel file di token.php ho inserito il mio token del bot telegram in una variabile.

`$token = "token";`

------------

### funzioni.php:
Nel file funzioni.php ho inserito dei define per facilitare l'inserimento dei parametri di mysqli.

    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB","scuola");

------------
### funzioniTelegram.php:
Nel file di funzioniTelegram.php tengo i metodi di telegram e le funzioni che mi servono. Nella prima parte del file richiedo i file che mi servono e creo la classe telegramBot.

    require_once("fetchFunzioni.php");
    require_once("funzioni.php");
    class telegramBot {
Nella seconda parte del file creo i metodi e le funzioni di telegram:
      protected $token;
    
      function __construct($token){
        $this->token = $token;
      }
      // funzione per ritornare il metodo
      private function  _getApiMethodUrl($methodName){
        return "https://api.telegram.org/bot$this->token/$methodName";
      }
      // funzione per ottenere il getMe del bot telegram
      public function getMe(){
        return json_decode(fetch($this->_getApiMethodUrl("getMe"), 'POST'));
      }
      // funzione per ottenere il getUpdates del bot telegram
      public function getUpdates(){
        return json_decode(fetch($this->_getApiMethodUrl("getUpdates?offset=-1"), 'POST'));
      }
      // funzione per settare il webHook
      public function setWebhook($url){
        return json_decode(fetch($this->_getApiMethodUrl("setWebhook"), 'POST', array(
          "url"=>$url
          )));
      }
      // funzione per cancellare il webHook
      public function deleteWebhook(){
        return json_decode(fetch($this->_getApiMethodUrl("deleteWebhook"), 'POST'));
      }
      // funzione per mandare i messaggi con i bottoni
      public function sendMessageStart($chatId, $text, $encodedKeyboard){
        return json_decode(fetch($this->_getApiMethodUrl("sendMessage"), 'POST', array(
          "chat_id"=>$chatId,
          "text"=>$text,
          "reply_markup"=>$encodedKeyboard
          )));
      }
      // funzione per mandare messaggi normali
      public function sendMessage($chatId, $text){
        return json_decode(fetch($this->_getApiMethodUrl("sendMessage"), 'POST', array(
          "chat_id"=>$chatId,
          "text"=>$text
        )));
      }
      // funzione per generare i bottoni dove ci sono i nomi degli immobili
      public function generateKeyboardImmobili($immobili){
        $keyboard = array();
        $immobile = null;
        foreach($immobili as $immobile){
            $keyboard[] = array($immobile['nome']);
        }
        $replyMarkup = array(
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
        );
        return json_encode($replyMarkup);
      }
    }

------------
### fetchFunzioni.php:
Il file fetchFunzioni.php mi serve per mandare delle richieste CURL.

------------

### Link del bot di telegram:
https://t.me/immobiliareAcuti_bot

------------

### N.B
Purtoppo nel bot per ricevere qualsiasi risposta bisogna aggiornare la pagina di xampp.