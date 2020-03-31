<?php

class PigManager extends Manager
{
    private $db;

    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    // Récupère une page de 6 cochons actifs
    function getPageOf6Pigs($debut, $limite)
    {
        $req = $this->db->prepare('SELECT 
                           id_pig, name_pig, type_sex, 
                           weight_pig, mother_pig, father_pig, 
                           DATE_FORMAT(birthdate_pig, \'%d/%m/%Y à %Hh%imin\') AS birthdate_pig,
                           DATE_FORMAT(deathdate_pig, \'%d/%m/%Y à %Hh%imin\'),
                           state_pig, name_photo 
                           FROM pig
                           LEFT JOIN photo
                           ON photo.id_photo = pig.thumbnail_pig
                           LEFT JOIN sex
                           ON pig.sex_pig = sex.id_sex
                           WHERE state_pig = 1
                           ORDER BY id_pig
                           LIMIT :debut, :limite;');
        $req->bindValue('debut', $debut, PDO::PARAM_INT);
        $req->bindValue('limite', $limite, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }

    // Récupère une page de 6 cochons actifs triés par poids et sexe
    function getPageOf6PigsSorted($sex, $weight, $debut, $limite)
    {
        if ($weight != 15) {
            $req = $this->db->prepare('SELECT 
                                id_pig, name_pig, type_sex, sex_pig,
                                weight_pig, mother_pig, father_pig, 
                                DATE_FORMAT(birthdate_pig, \'%d/%m/%Y à %Hh%imin\') AS birthdate_pig,
                                DATE_FORMAT(deathdate_pig, \'%d/%m/%Y à %Hh%imin\'),
                                state_pig, name_photo 
                                FROM pig
                                LEFT JOIN photo
                                ON photo.id_photo = pig.thumbnail_pig
                                LEFT JOIN sex
                                ON pig.sex_pig = sex.id_sex
                                WHERE sex_pig = :sex AND weight_pig BETWEEN :weight AND (:weight + 5)
                                AND state_pig = 1
                                ORDER BY id_pig
                                LIMIT :debut, :limite;');
        } 
        else {
            $req = $this->db->prepare('SELECT 
                                id_pig, name_pig, type_sex, sex_pig,
                                weight_pig, mother_pig, father_pig, 
                                DATE_FORMAT(birthdate_pig, \'%d/%m/%Y à %Hh%imin\') AS birthdate_pig,
                                DATE_FORMAT(deathdate_pig, \'%d/%m/%Y à %Hh%imin\'),
                                state_pig, name_photo 
                                FROM pig
                                LEFT JOIN photo
                                ON photo.id_photo = pig.thumbnail_pig
                                LEFT JOIN sex
                                ON pig.sex_pig = sex.id_sex
                                WHERE sex_pig = :sex AND weight_pig >= :weight
                                AND state_pig = 1
                                ORDER BY id_pig
                                LIMIT :debut, :limite;');
        }
        $req->bindValue('sex', $sex, PDO::PARAM_INT);
        $req->bindValue('weight', $weight, PDO::PARAM_INT);
        $req->bindValue('debut', $debut, PDO::PARAM_INT);
        $req->bindValue('limite', $limite, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }

    // Récupère tous les cochons actifs avec toutes leurs infos
    function getPigs()
    {
        $req = $this->db->query('SELECT 
                           pig1.id_pig, pig1.name_pig, 
                           type_sex, pig1.weight_pig,
                           pig1.mother_pig, pig1.father_pig, 
                           pig2.name_pig AS mother_name,
                           pig3.name_pig AS father_name,
                           pig1.state_pig, name_photo,
                           DATE_FORMAT(pig1.birthdate_pig, \'%Y/%m/%d\') AS raw_birthdate_pig,
                           DATE_FORMAT(pig1.birthdate_pig, \'%d/%m/%Y à %Hh%imin\') AS birthdate_pig,
                           DATE_FORMAT(pig1.deathdate_pig, \'%d/%m/%Y à %Hh%imin\') AS deathdate_pig,
                           (DATEDIFF(pig1.deathdate_pig, NOW())) AS deathtime_pig
                           FROM pig AS pig1
                           LEFT OUTER JOIN pig AS pig2
                           ON pig2.id_pig = pig1.mother_pig
                           LEFT OUTER JOIN pig AS pig3
                           ON pig3.id_pig = pig1.father_pig
                           LEFT JOIN photo
                           ON photo.id_photo = pig1.thumbnail_pig
                           LEFT JOIN sex
                           ON pig1.sex_pig = sex.id_sex
                           WHERE pig1.state_pig = 1
                           ORDER BY id_pig;');
        return $req;
    }

    // Récupère le nombre de cochons actifs
    function getNumberOfPigs()
    {
        $req = $this->db->query('SELECT 
                           COUNT(*) AS total_alive_pigs
                           FROM pig
                           WHERE state_pig = 1;');
        $row = $req->fetch();
        return $row;
    }

    // Récupère le nombre de cochons actifs et vivants
    function getNumberOfAlivePigs()
    {
        $req = $this->db->query('SELECT COUNT(*) AS total_alive_pigs
                           FROM pig
                           WHERE state_pig = 1
                           AND (deathdate_pig - birthdate_pig) != 0
                           AND (deathdate_pig - birthdate_pig) > 0;');
        $row = $req->fetch();
        return $row;
    }

    // Récupère le nombre de cochons actifs et vivants triés par sexe et poids
    function getNumberOfPigsSorted($sex, $weight)
    {
        if ($weight != 15)
        {
            $req = $this->db->prepare('SELECT 
            COUNT(*) AS total_alive_pigs
            FROM pig
            WHERE ((deathdate_pig - birthdate_pig) != 0
            OR (deathdate_pig - birthdate_pig) < 0)
            AND sex_pig = :sex AND weight_pig BETWEEN :weight AND (:weight + 5)
            AND state_pig = 1;');
        }
        else
        {
            $req = $this->db->prepare('SELECT 
            COUNT(*) AS total_alive_pigs
            FROM pig
            WHERE ((deathdate_pig - birthdate_pig) != 0
            OR (deathdate_pig - birthdate_pig) < 0)
            AND sex_pig = :sex AND weight_pig >= :weight
            AND state_pig = 1;');
        }
        $req->bindValue('sex', $sex, PDO::PARAM_INT);
        $req->bindValue('weight', $weight, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch();
        return $row;
    }

    // Récupère toutes les infos possibles d'un cochon
    function getPig($pigId)
    {
        $req = $this->db->prepare('SELECT
                             pig1.id_pig, pig1.name_pig, pig1.sex_pig, type_sex,
                             pig1.weight_pig, pig1.mother_pig, pig1.father_pig,
                             pig1.birthdate_pig AS raw_birthdate_pig, 
                             pig1.deathdate_pig AS raw_deathdate_pig,
                             name_photo,
                             pig2.name_pig AS mother_name,
                             pig3.name_pig AS father_name,
                             DATE_FORMAT(pig1.deathdate_pig, \'%d/%m/%Y\') AS deathdate_pig,
                             DATE_FORMAT(pig1.birthdate_pig, \'%d/%m/%Y à %Hh%imin\') AS birthdate_pig,
                             (DATEDIFF(pig1.deathdate_pig, NOW())) AS deathtime_pig
                             FROM pig AS pig1
                             LEFT OUTER JOIN pig AS pig2
                             ON pig2.id_pig = pig1.mother_pig
                             LEFT OUTER JOIN pig AS pig3
                             ON pig3.id_pig = pig1.father_pig
                             LEFT JOIN photo
                             ON photo.id_photo = pig1.thumbnail_pig
                             LEFT JOIN sex
                             ON pig1.sex_pig = sex.id_sex
                             WHERE pig1.id_pig = :pigId
                             AND pig1.state_pig = 1;');
        $req->bindParam(':pigId', $pigId);
        $req->execute();
        $pig = $req->fetch();

        return $pig;
    }

    // Récupère les 3 derniers cochons actifs
    public function get3LastPig()
    {
        $req = ("SELECT 
                id_pig, name_pig, weight_pig, state_pig, name_photo, type_sex
                FROM pig
                LEFT JOIN photo
                ON photo.id_photo = pig.thumbnail_pig 
                LEFT JOIN sex
                ON sex.id_sex = pig.sex_pig
                WHERE state_pig = 1
                ORDER BY id_pig DESC LIMIT 3;");
        $response = $this->db->query($req);
        $lastPigs = $response->fetchAll(PDO::FETCH_ASSOC);
        return $lastPigs;
    }

    // Récupère la photo principale d'un cochon grâce à son id
    public function getPigPhoto($id)
    {
        $req = $this->db->prepare("SELECT name_photo FROM photo
                                   INNER JOIN pig
                                   ON photo.id_photo = pig.thumbnail_pig
                                   WHERE id_pig = :id;");
        $req->bindParam(':id', $id);
        $req->execute();
        $photo = $req->fetchAll(PDO::FETCH_ASSOC);
        return $photo;
    }

    // Récupère les photos d'un cochons
    public function getPigPhotos($id)
    {
        $req = $this->db->prepare("SELECT name_photo, link_photo_pig.id_photo FROM photo
                                   INNER JOIN link_photo_pig
                                   ON photo.id_photo = link_photo_pig.id_photo
                                   INNER JOIN pig
                                   ON link_photo_pig.id_pig = pig.id_pig
                                   WHERE pig.id_pig = :id;");
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }

    // Récupère tous les cochons actifs et compte les lignes
    public function getCountPig()
    {
        $req = ("SELECT * FROM pig
                WHERE state_pig = 1;");
        $response = $this->db->query($req);
        $count = $response->rowCount();
        return $count;
    }

    // Récupère le plus petit id et le plus grand id des cochons actifs
    public function getMinAndMaxIdPig()
    {
        $req = $this->db->query("SELECT MIN(id_pig) AS min_id_pig, 
                MAX(id_pig) AS max_id_pig
                FROM pig
                WHERE state_pig = 1;");
        $response = $req->fetch(PDO::FETCH_ASSOC);
        return $response;
    }

    // Crée un cochon avec des paramètres
    public function createPig($name, $sex, $weight, $birthdate, $deathdate, $thumbnail){
        $req = $this->db->prepare("INSERT INTO pig 
                            (name_pig, sex_pig, weight_pig,
                            birthdate_pig, deathdate_pig, thumbnail_pig)
                            VALUES (:name, :sex, :weight, :birthdate, :deathdate, :thumbnail);");
        $req->bindParam(':name', $name);
        $req->bindParam(':sex', $sex);
        $req->bindParam(':weight', $weight);
        $req->bindParam(':birthdate', $birthdate);
        $req->bindParam(':deathdate', $deathdate);
        $req->bindParam(':thumbnail', $thumbnail);
        $req->execute();
    }

    // Récupère le dernier cocohon enregistré dans la base
    public function getLastPig(){
        $req = $this->db->query("SELECT MAX(id_pig) AS id_pig
                          FROM pig;");
        $id = $req->fetchAll(PDO::FETCH_ASSOC);                  
        return $id;
    }

    // Relie un cochon avec une photo
    public function linkPhoto($id_pig, $id_photo){
        $req = $this->db->prepare("INSERT INTO link_photo_pig
                            (id_pig, id_photo)
                            VALUES (:id_pig, :id_photo);");
        $req->bindParam(':id_pig', $id_pig);
        $req->bindParam(':id_photo', $id_photo);
        $req->execute();
    }

    // Met à jour un cochon
    public function updatePig($id, $name, $sex, $weight, $birthdate, $deathdate, $thumbnail){
        $req = $this->db->prepare("UPDATE pig
                            SET name_pig = :name, sex_pig = :sex, 
                            weight_pig = :weight, birthdate_pig = :birthdate, 
                            deathdate_pig = :deathdate, thumbnail_pig = :thumbnail,
                            updated_at_pig = NOW()
                            WHERE id_pig = :id;");
        $req->bindParam(':name', $name);
        $req->bindParam(':sex', $sex);
        $req->bindParam(':weight', $weight);
        $req->bindParam(':birthdate', $birthdate);
        $req->bindParam(':deathdate', $deathdate);
        $req->bindParam(':thumbnail', $thumbnail);
        $req->bindParam(':id', $id);
        $req->execute();
    }

    // Supprime les photos liées au cochon
    public function deleteLinkedPhotos($id){
        $req = $this->db->prepare("DELETE FROM link_photo_pig
                            WHERE id_pig = :id;");
        $req->bindParam(':id', $id);
        $req->execute();
    }

    // Rend un cochon inactif (le "supprime")
    public function deletePig($id){
        $req = $this->db->prepare("UPDATE pig
                            SET state_pig = 0
                            WHERE id_pig = :id;");
        $req->bindParam(':id', $id);
        $req->execute();
    }

    // Crée un cochon aléatoire sans parent
    public function createRandomPig($name){
        $req = $this->db->prepare("INSERT INTO pig (name_pig, sex_pig, weight_pig, birthdate_pig, deathdate_pig, thumbnail_pig)
        VALUES (:name, ROUND(RAND()), ((RAND()*20)+1), 
        (SELECT NOW() - INTERVAL FLOOR(RAND() * 300) DAY), 
        (SELECT NOW() + INTERVAL FLOOR(RAND() * 2000) DAY), ((RAND() * 18) + 1));");
        $req->bindParam(':name', $name);
        $req->execute();
    }

    // Tue un cochon en mettant à jour sa date de mort
    public function killPig($id){
        $req = $this->db->prepare("UPDATE pig
                            SET deathdate_pig = NOW()
                            WHERE id_pig = :id;");
        $req->bindParam(':id', $id);
        $req->execute();
    }

    // Récupère les cochons mâles
    public function getMalePigs(){
        $req = ("SELECT * FROM pig 
                WHERE sex_pig = 0 
                AND state_pig = 1 
                AND (deathdate_pig - birthdate_pig) != 0
                AND (deathdate_pig - birthdate_pig) > 0;");
        $response = $this->db->query($req);
        return $response;
    }

    // Récupère les cochons femelles
    public function getFemalePigs(){
        $req = ("SELECT * FROM pig 
                WHERE sex_pig = 1
                AND state_pig = 1 
                AND (deathdate_pig - birthdate_pig) != 0
                AND (deathdate_pig - birthdate_pig) > 0;");
        $response = $this->db->query($req);
        return $response;
    }

    // Crée un cochon aléatoire avec des parents (reproduction)
    public function createRandomPigWithParents($name, $motherPig, $fatherPig){
        $req = $this->db->prepare("INSERT INTO pig (name_pig, sex_pig, weight_pig, mother_pig, father_pig, birthdate_pig, deathdate_pig, thumbnail_pig)
        VALUES (:name, ROUND(RAND()), ((RAND()*20)+1), :motherPig, :fatherPig, NOW(), 
        (SELECT NOW() + INTERVAL FLOOR(RAND() * 2000) DAY), ((RAND() * 18) + 1));");
        $req->bindParam(':name', $name);
        $req->bindParam(':motherPig', $motherPig);
        $req->bindParam(':fatherPig', $fatherPig);
        $req->execute();
    }
}