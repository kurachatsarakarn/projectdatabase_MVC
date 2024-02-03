<?php
class SumController
{
    public function index()
        {
        $sum_list = sum::getAll();
        require_once('views/sum/index_sum.php');
        }
}
?>