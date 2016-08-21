<?php
/**
 * Created by PhpStorm.
 * User: marlo
 * Date: 20/08/16
 * Time: 22:23
 */

$json_s = file_get_contents('/vagrant/database/books.json');
$json_a = json_decode($json_s, true);
$all = $json_a['books'];//print_r($all[1]);exit;

$db = new SQLite3('/var/www/database/elastique.sqlite');

$db->exec('CREATE TABLE IF NOT EXISTS books (id INT PRIMARY KEY, isbn INT, author_id INT, publisher_id TINYINT, title CHAR(60), cover_url CHAR(60), description TEXT)');

foreach($all as $i) {
    $id = $i['id'];
    $isbn = $i['isbn'];
    $title = $i['title'];
    $description = $i['description'];
    $cover_url = $i['cover_url'];
    $publisher_id = $i['publisher']['id'];
    $author_id = $i['author']['id'];

    $stmt = $db->prepare("INSERT INTO books (id,isbn,author_id,publisher_id,title,cover_url,description) VALUES(:id,:isbn,:author_id,:publisher_id,:title,:cover_url,:description);");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':isbn', $isbn);
    $stmt->bindValue(':author_id', $author_id);
    $stmt->bindValue(':publisher_id', $publisher_id);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':cover_url', $cover_url);
    $stmt->bindValue(':description', $description);
    $stmt->execute();

}

$db->close();