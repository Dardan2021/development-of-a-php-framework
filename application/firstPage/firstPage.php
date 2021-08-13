<?php

class firstPage
{
    public static function getDataFirstPage($tableName, $filter = array(), $params = array())
    {
        $params['join'][] = array(
            "table"       => "teacher",
            "key"         => "id",
            "foreignKey"  => "id",
            "alias"       => "teacher"
        );

        $params['join'][] = array(
            "table"       => "class",
            "key"         => "id",
            "foreignKey"  => "id",
            "alias"       => "class"
        );

        $datas = userModel::fetchAllData($tableName, $filter, $params);
        $dataArray['values'] = json_decode(json_encode($datas), true);

        return $dataArray;
    }
}
