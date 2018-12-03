<?php

class TextContent {

  // datafields WHICH MAY NOT APPLY OR BE NECESSARY - FOR PROTOTYPING ONLY

  protected $content = "";
  //what dad says is to be the text for the content
  protected $altered_content = "";
  //when this class was created, i.e. when dad hits submit on the miniform
  protected $timestampAdded = null;
  //when this class was updated, i.e. when dad hits update on the miniform
  protected $timestampChanged = null;
  //when this class was removed from the database, i.e. when dad hits delete button on the miniform
  protected $timestampRemoved = null;
  //if class is to be shown, this is true, otherwise, false
  protected $isLive = false;

  // CURRENT CONSTRUCTOR
  function __construct($content) {
    echo "a new object was created";
    $this->content = $content;
    // echo $this->content;
  }

  static function showUpdatedContents() {

  }

  function test() {
    echo "entered test function<br>";
  }

  function alterDatabase($altered_content, $alterationCode) {
    echo "alterDatabase function entered<br>";
  	switch($alterationCode) {
  		case 'create':
  			createContent($alteredContent);
        $timestampAdded = $_SERVER['REQUEST_TIME'];
  			break;
  		case 'read':
        echo "entered 'read' case of switch<br>";
  			readContent($alteredContent);
  			break;
  		case 'update':
  			updateContent($alteredContent);
        $timestampChanged = $_SERVER['REQUEST_TIME'];
  			break;
  		case 'delete':
  			deleteContent($alteredContent);
        $timestampRemoved = $_SERVER['REQUEST_TIME'];
  			break;
  		default: echo "THIS IS CRAP BUT NOT CRUD";
  	}
  }
  function createContent($alteredContent) {
  	//create content in database
  	//add a record
  }
  function readContent($alteredContent) {
  	//read content from database
  	//read a record
  }
  function updateContent($alteredContent) {
  	//update content in database
  	//update a record
  }
  function deleteContent($alteredContent) {
  	//remove content from database
  	//delete a record
  }

  static function getAllTextContents() {
    // will likely implement some kind of SELECT * FROM ??? query and put them into an array using FETCH_ALL PDO::ASSOC or whatever the syntax is
    $testType = 'easy';
    // $testType = 'hard';
    if($testType = 'easy') {
      return array('sample text 1', 'sample text 2', 'sample text 3');
    }
    elseif($testType = 'hard') {
      return 'change the elseif in getTextContents to be some form of returning all/some/certain text_content from database';
    }
    else {
      return 'getTextContents() has problems, probably in comparing strings';
    }
  }
}
