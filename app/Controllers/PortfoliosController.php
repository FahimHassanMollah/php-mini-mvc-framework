<?php

namespace App\Controllers;

use App\Base\Controller;
use App\Models\Portfolio;
use PDO;
use PDOException;

class PortfoliosController extends Controller
{
    public function index()
    {

        $portfolio = new Portfolio();
        $portfolios = $portfolio->get();
        // $servername = "localhost";
        // $username = "root";
        // $password = "root";

        // try {
        //     $pdo = new PDO("mysql:host=$servername;dbname=php-mvc", $username, $password);
        //     // set the PDO error mode to exception
        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    $stmt = $pdo->query('SELECT * FROM test');
        //    var_dump($stmt);
        // //    $stmt->execute();
        //    $portfolios = $stmt->fetch(PDO::FETCH_ASSOC);
        //    $portfolio2 = $stmt->fetch(PDO::FETCH_ASSOC);
        //    echo "<pre>";
        //    var_dump($portfolios);    
        //    var_dump($portfolio2);    
        //     echo "Connected successfully";
        // } catch (PDOException $e) {
        //     echo "Connection failed: " . $e->getMessage();
        // }
        return views('portfolios/index',['portfolios' => $portfolios]);
    }

    public function show($id)
    {
        echo 'ProtfoliosController show ' . $id;
        return;
    }
}
