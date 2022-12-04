<?php
namespace App\Data;
class SearchData
{
    /**
     * @var string
     */
    public $q = '';
    /**
     * @var Category[]
     */
    public $categories = [];
    /**
     * @var User[]
     */
    public $sellers = [];
    /**
     * @var int
     */
    public $price;
}