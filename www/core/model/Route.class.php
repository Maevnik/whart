<?php
    class Route extends GM
    {
        public function Write($time,$remoteip,$callpoint,$info)
        {
            $this->pdo->prepare('INSERT INTO `log` VALUES (NULL,$time,$remoteip,$callpoint,$info)')->execute();
        }
        
    }