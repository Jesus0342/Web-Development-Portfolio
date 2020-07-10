<?php
    include_once 'dbh.class.php';

    class Project extends Dbh
    {
        public function getProjects()
        {
            $sql = "SELECT * FROM projects";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute();

            if($rows = $stmt->fetchAll())
            {
                return $rows;
            }
            else
            {
                return "error";
            }
            
        }
    }
?>