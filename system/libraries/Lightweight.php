<?php

class Lightweight
{
  public function __construct()
  {

  }

  public function view($viewName, $data = [])
  {
      if(file_exists("../application/views/".$viewName.".php"))
      {
            require_once  "../application/views/".$viewName.".php";
      }
      else
      {
          echo "sorry it is not found";
      }
  }

  public function model($modelName)
  {
      if (file_exists("../application/model/" . $modelName . ".php")) {

          require_once "../application/model/" . $modelName . ".php";

          return new $modelName;
      }
      else
      {
          echo "sorry it is not found";
      }
  }

  public function helper($helperName)
  {
      if(file_exists("../system/helpers/".$helperName.".php"))
      {
          require_once "../system/helpers/".$helperName.".php";
      }
      else
      {
          echo "sorry it is not found";
      }
  }
}