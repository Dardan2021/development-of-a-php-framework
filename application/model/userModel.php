<?php

class userModel extends Database
{
    public function insertData($table, $data)
    {
        foreach ($data as $key => $value)
        {
            $value = "'$value'";
            $arrayValue[] = $value;
            $arrayKey[] = $key;
        }

        $dataValues = implode(",", $arrayValue);
        $dataColumns = implode(",", $arrayKey);

        if ($this->Query("INSERT INTO " . "$table ($dataColumns) values($dataValues)"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function fetchNrData($tableName)
    {
        return $this->countData($tableName);
    }

    public function fetchAllData($tableName, $filter = array(), $params = array())
    {
        if(!empty($filter))
        {
            foreach ($filter as $columns => $value)
            {
                $queryArray[] = "$columns='$value'";
            }

            $querySql = implode(",", $queryArray);
            $this->Query("SELECT * FROM " . "$tableName " . "WHERE " . "$querySql");

            return $this->fetchData();
        }

        if(isset($params['fetch']))
        {
            switch($params['fetch'])
            {
                case 'array':

                    return $this->fetchData();

                    break;

                case 'value':

                    return $this->singleData();

                    break;
            }
        }

        if(isset($params['join']))
        {
            foreach ($params['join']['table'] as $joinTableName)
            {
                $queryArrayTableName[] = $joinTableName;
            }

            foreach ($params['join']['alias'] as $aliasName)
            {
                $queryArrayAlias[] = $aliasName;
            }

            foreach ($params['join']['field'] as $fieldName)
            {
                $queryArrayField[] = $fieldName;
            }

            foreach ($params['join']['key'] as  $key)
            {
                $queryArrayKey[] = $key;
            }

            foreach ($params['join']['foreignKey'] as  $foreignKey)
            {
                $queryArrayForeignKey[] = $foreignKey;
            }

            foreach($queryArrayKey as $key)
            {
                $queryAliasKey[] = "$tableName.$key";
            }

            $arrayCombineAliasFKey = array_combine($queryArrayAlias, $queryArrayForeignKey);

            foreach($arrayCombineAliasFKey as $key => $value)
            {
                $queryArrayCombineAliasFKey[] = "$key.$value";
            }

            $queryArrayFieldTable = array_combine($queryArrayTableName, $queryArrayField);

            foreach ($queryArrayFieldTable as $key => $value)
            {
                $queryArrayFieldData[] = "$key.$value";
            }

            $querySql = implode(",", $queryArrayFieldData);

            $numberJoins = count($queryArrayTableName[]);

            for ($i = 0; $i < $numberJoins; $i++)
            {
                $queryJoin .= "INNER JOIN $queryArrayTableName[$i] ON $queryAliasKey[$i] = $queryArrayCombineAliasFKey[$i]";
            }

            $this->Query("SELECT $querySql FROM $tableName   $queryJoin ");
            return $this->fetchData();
        }

        else if(empty($filter) && empty($params))
        {
            if ($this->Query("SELECT * FROM " . "$tableName "))
            {
                return $this->fetchData();
            }
        }
    }

    public function deleteData($tableName, $filter= array())
    {
        if(!empty($filter))
        {
            foreach ($filter as $columns => $value)
            {
                $queryArray[] = "$columns='$value'";
            }

            $querySql = implode(",", $queryArray);

            if($this->Query("DELETE FROM $tableName WHERE $querySql"))
            {
                echo "Data u hoq";
            }
        }
    }

    public function updateData($tableName, $filter= array(), $updateValues)
    {
        if(!empty($filter) && !empty($updateValues))
        {
            foreach ($filter as $columns => $value)
            {
                $queryArray[] = "$columns='$value'";
            }

            $querySql = implode(",", $queryArray);

            foreach ($updateValues as $columns => $value)
            {
                $queryArrayUpdateValues[] = "$columns='$value'";
            }

            $querySqlUpdateValues = implode(",", $queryArrayUpdateValues);

            if($this->Query("UPDATE $tableName SET $querySqlUpdateValues WHERE $querySql"))
            {
                echo "Data u ndryshua";
            }
        }
        else
        {
            return 0;
        }
    }

}
?>