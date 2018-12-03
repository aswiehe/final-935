<?php
$_SESSION['newSession'] = false;
function checkForNewSession() {
  $_SESSION['newSession'] = true;
  return $_SESSION['newSession'] ;
}

function getLiveTextContents($database) {
  $sql = file_get_contents('sql/getLiveTextContents.sql');
  $statement = $database->prepare($sql);
  $statement->execute();
  $liveTextContents = $statement->fetchAll(PDO::FETCH_ASSOC);
  $printableLiveTextContents = array();
  foreach($liveTextContents as $liveTextContent) {
    array_push($printableLiveTextContents, $liveTextContent);
  }
  return $printableLiveTextContents;
}
function getLiveUserContents($database) {
  $sql = file_get_contents('sql/getLiveTextContents.sql');
  $statement = $database->prepare($sql);
  $statement->execute();
  $liveTextContents = $statement->fetchAll(PDO::FETCH_ASSOC);
  $printableLiveTextContents = array();
  foreach($liveTextContents as $liveTextContent) {
    array_push($printableLiveTextContents, $liveTextContent);
  }
  return $printableLiveTextContents;
}
function insertLiveContent($text_location, $text_content, $database) {
  $sql = file_get_contents('sql/insertTextContent.sql');
  $params = array(
    'text_location' => $text_location,
    'text_content' => $text_content,
  );
  $statement = $database->prepare($sql);
  $statement->execute($params);
  // $text_content_array = $statement->fetchAll(PDO::FETCH_ASSOC);
  // $text_content = $text_content_array[0];
  // return $text_content;
}
function insertUserContent($user_id, $text_location, $text_content, $database) {
  $sql = file_get_contents('sql/insertUserContents.sql');
  $params = array(
    'user_id' => $user_id,
    'text_location' => $text_location,
    'text_content' => $text_content
  );
  $statement = $database->prepare($sql);
  $statement->execute($params);
  // $text_content_array = $statement->fetchAll(PDO::FETCH_ASSOC);
  // $text_content = $text_content_array[0];
  // return $text_content;
}
function removeContent($text_content_id, $database) {
  $sql = file_get_contents('sql/removeUserContent.sql');
  $params = array(
    'text_content_id' => $text_content_id
  );
  $statement = $database->prepare($sql);
  $statement->execute($params);
  // $text_content_array = $statement->fetchAll(PDO::FETCH_ASSOC);
  // $text_content = $text_content_array[0];
  // return $text_content;
}
function removeUserContent($user_id, $text_content_id, $database) {
  $sql = file_get_contents('sql/removeUserContent.sql');
  $params = array(
    'user_id' => $user_id,
    'text_content_id' => $text_content_id,
  );
  $statement = $database->prepare($sql);
  $statement->execute($params);
  // $text_content_array = $statement->fetchAll(PDO::FETCH_ASSOC);
  // $text_content = $text_content_array[0];
  // return $text_content;
}
function getAllTextContents(){
  echo "stub code";
}
function getSimilarTextContents(){
  echo "stub code";
}
function testFunctionFile(){
  echo "functions.php has been accessed<br>";
}

function getTextContent($text_content_id, $database){
  $sql = file_get_contents('sql/getTextContent.sql');
  $params = array(
    'text_content_id' => $text_content_id
  );
  $statement = $database->prepare($sql);
  $statement->execute($params);
  $text_content_array = $statement->fetchAll(PDO::FETCH_ASSOC);
  $text_content = $text_content_array[0];
  return $text_content;
}
function getUserContent($user_id, $text_content_id, $database){
  echo "getting user content";
  $sql = file_get_contents('sql/getTextContent.sql');
  $params = array(
    'text_content_id' => $text_content_id
  );
  $statement = $database->prepare($sql);
  $statement->execute($params);
  $text_content_array = $statement->fetchAll(PDO::FETCH_ASSOC);
  $text_content = $text_content_array[0];
  return $text_content;
}
