<?php
require_once("fetchFunzioni.php");
require_once("funzioni.php");

class telegramBot {
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

?> 