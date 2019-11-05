<?php

class News 
{
    public static function getNewsItemById($id)
    {
        $id = intval($id);
        
        if ($id) {
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            
            return $newsItem;
        }
        
    }
    public static function getNewsList() 
    {
        $db = Db::getConnection();
        
       
        $newsList = array();
        
        $result = $db->query('SELECT id, title, content FROM news');
       
        $i = 0;
        
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['content'] = $row['content'];
            $i++;
            
        }
        return $newsList;
    }
    
}

