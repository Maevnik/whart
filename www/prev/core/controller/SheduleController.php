<?php
class SheduleController
{
    private $db;
    function __construct() {
        $db = new DataBaseModel();
    }
    function Create()
    {
        echo "This is new shedule method";
    }
    function Delete()
    {
        echo "This is delete method";
    }
    function Edit()
    {
         echo "This is edit method";
    }
    function View()
    {
         echo "This is edit method";
    }
}