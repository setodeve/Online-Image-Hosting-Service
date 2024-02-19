<?php

namespace Helpers;

use Database\MySQLWrapper;
use Helpers\ValidationHelper;
use Exception;

class DatabaseHelper
{
    public static function getImages(): array{
        $db = new MySQLWrapper();
        $images = array();
        $result = $db->query('SELECT * FROM images');
        while($row = $result->fetch_assoc()) {
            if (($row["deleted_at"] <= date("Y-m-d H:i:s", time()))){
            }else{
                array_push($images,$row);
            }
        }
        if (!$images) throw new Exception('Could not find images in database');

        return $images;
    }


    public static function getImage(string $name): array{
        $db = new MySQLWrapper();
        $stmt = $db->prepare("SELECT * FROM images WHERE img = ?");
        $stmt->bind_param('s', $name);
        $stmt->execute();

        $result = $stmt->get_result();
        $image = $result->fetch_assoc();
        
        if (!$image || ($image["deleted_at"] <= date("Y-m-d H:i:s", time()))){
            header("Location: no-exist");
            exit;
        }

        return $image;
    }

    public static function setImage(array $data,string $imagePath){
        $db = new MySQLWrapper();
        $data = ValidationHelper::stringObject($data);
        $comment = htmlspecialchars($data['comment'], ENT_QUOTES, "UTF-8");
        $imagePath = htmlspecialchars($imagePath, ENT_QUOTES, "UTF-8");
        $date = self::getTime($data["expiry"]);
        $stmt = $db->prepare('INSERT INTO images (img, comment, deleted_at) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $imagePath, $comment, $date);
        $stmt->execute();
    }

    private static function getTime($expiry){
        $time = time();
        if ($expiry == "10 seconds"){
            $time += 10;
        }elseif ($expiry == "10 minitues"){
            $time += 600;
        }elseif ($expiry == "1 hours"){
            $time += 3600;
        }elseif ($expiry == "1 day"){
            $time += (24*3600);
        }elseif ($expiry == "1 week"){
            $time += (24*3600*7);
        }else{
            $time += 10;
        }
        return date("Y-m-d H:i:s", $time);
    }
}