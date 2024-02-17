<?php

namespace Helpers;

use Database\MySQLWrapper;
use Helpers\ValidationHelper;
use Exception;

class DatabaseHelper
{
    public static function getSnipets(): array{
        $db = new MySQLWrapper();
        $snipets = array();
        $result = $db->query('SELECT * FROM snipets');
        while($row = $result->fetch_assoc()) {
            if (($row["deleted_at"] <= date("Y-m-d H:i:s", time()))){
            }else{
                array_push($snipets,$row);
            }
        }
        if (!$snipets) throw new Exception('Could not find snipets in database');

        return $snipets;
    }

    public static function getSnipet(int $id): array{
        $db = new MySQLWrapper();
        $stmt = $db->prepare("SELECT * FROM snipets WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $snipet = $result->fetch_assoc();
        
        if (!$snipet || ($snipet["deleted_at"] <= date("Y-m-d H:i:s", time()))){
            header("Location: no-exist");
            exit;
        }

        return $snipet;
    }

    public static function setSnipet(array $data){
        $db = new MySQLWrapper();
        $data = ValidationHelper::stringObject($data);
        $title = htmlspecialchars($data['title'], ENT_QUOTES, "UTF-8");
        $content = htmlspecialchars($data['content'], ENT_QUOTES, "UTF-8");
        $language = htmlspecialchars($data['language'], ENT_QUOTES, "UTF-8");
        $time = time();
        if ($data["expiry"] == "10 seconds"){
            $time += 10;
        }elseif ($data["expiry"] == "10 minitues"){
            $time += 600;
        }elseif ($data["expiry"] == "1 hours"){
            $time += 3600;
        }elseif ($data["expiry"] == "1 day"){
            $time += (24*3600);
        }elseif ($data["expiry"] == "1 week"){
            $time += (24*3600*7);
        }else{
            $time += 10;
        }
        $date = date("Y-m-d H:i:s", $time);

        $stmt = $db->prepare('INSERT INTO snipets (title, content, lang, deleted_at) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $title, $content, $language, $date);
        $stmt->execute();
    }
}