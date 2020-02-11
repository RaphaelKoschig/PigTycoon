<?php

class PigManager extends Manager
{
    function getPigs()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT 
                           id_pig, name_pig, sex_pig, 
                           weight_pig, mother_pig, father_pig, 
                           DATE_FORMAT(birthdate_pig, \'%d/%m/%Y à %Hh%imin%ss\') AS birthdate_pig,
                           DATE_FORMAT(deathdate_pig, \'%d/%m/%Y à %Hh%imin%ss\'),
                           state_pig, name_photo 
                           FROM pig
                           LEFT JOIN photo
                           ON photo.id_photo = pig.thumbnail_pig;
                           ');
        //$all = $req->fetchAll(PDO::FETCH_ASSOC);
        return $req;
    }

    function getPig($pigId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT
                             id_pig, name_pig, sex_pig, 
                             weight_pig, mother_pig, father_pig, 
                             DATE_FORMAT(birthdate_pig, \'%d/%m/%Y à %Hh%imin%ss\') AS birthdate_pig,
                             (TIMEDIFF(deathdate_pig, NOW())) AS deathtime_pig,
                             state_pig, name_photo 
                             FROM pig
                             LEFT JOIN photo
                             ON photo.id_photo = pig.thumbnail_pig;
                             FROM  WHERE id = ?');
        $req->execute(array($pigId));
        $pig = $req->fetch();

        return $pig;
    }

    // Récupère les 3 derniers cochons
    public function get3LastPig()
    {
        $db = $this->dbConnect();

        $req = "SELECT 
                id_pig, name_pig, weight_pig, state_pig, name_photo, type_sex
                FROM pig
                LEFT JOIN photo
                ON photo.id_photo = pig.thumbnail_pig 
                LEFT JOIN sex
                ON sex.id_sex = pig.sex_pig
                ORDER BY id_pig DESC LIMIT 3";
        $response = $db->query($req);
        $lastPigs = $response->fetchAll(PDO::FETCH_ASSOC);
        return $lastPigs;
    }

    // Récupère la photo principale d'un cochon grâce à son id
    public function getPigPhoto($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT name_photo FROM photo
                                   INNER JOIN pig
                                   ON photo.id_photo = pig.thumbnail_pig
                                   WHERE id_pig = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        $photo = $req->fetchAll(PDO::FETCH_ASSOC);
        return $photo;
    }
}
