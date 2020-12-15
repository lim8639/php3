<?php

class ConnecToDB

{
    private static $instance = array();

    //防止外部创建新的数据库连接类
    private function _constuct()
    {
//        三段式
    }
    static public function Connect()
    {
        //连接类不够100，创建新类

        if (count(self::$instance) < 100) {

            $newDb = new self();

            self::$instance[] = $newDb;

            return $newDb::ConDB();

        } else {
            //随机数保证数据库连接均衡

            $i = rand(0, 99);

            $new_obj = self::$instance[$i];

            return $new_obj::ConDB();

        }

    }

    static private function ConDB()

    {

        try {

            $connec = new mysqli('123.56.1.58', 'myphp', 'hYsDmwyFt8MDmjwh', 'myphp', 3306);



        } catch (Exception $e) {

            $errors[] = $e->getMessage();

        }

    }
}