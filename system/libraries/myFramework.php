<?php

class myFramework
{
  use formValidation;

  public function __construct()
  {
      if (file_exists("../system/config/autoload.php"))
      {
          require_once "../system/config/autoload.php";

          $helpers = $autoload['helpers'];
          $this->helper($helpers);
      }
  }

  public static function view($viewName, $data = [])
  {
      if (file_exists("../application/views/" . $viewName . ".php"))
      {
          require_once "../application/views/" . $viewName . ".php";
      }
      else
      {
          echo "sorry it is not found";
      }
  }

  public static function model($modelName)
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

  public function helper($helperNames = array())
  {
      if (!empty($helperNames))
      {
          foreach ($helperNames as $helperName)
          {
              if (file_exists("../system/helpers/" . $helperName . ".php"))
              {
                  require_once "../system/helpers/" . $helperName . ".php";
              }
              else
              {
                  echo "sorry it is not found";
              }
          }
      }
  }

  public function post($field_name)
  {
      if ($_SERVER['REQUEST_METHOD'] == 'post' || $_SERVER['REQUEST_METHOD'] == 'POST')
      {
          return strip_tags(trim($_POST[$field_name]));
      }
      else
      {
          echo "sorry it is not found";
      }
  }

    public function uri($arrayIndex)
    {
        if(isset($_GET['url']))
        {
            $url = $_GET['url'];
            $url = rtrim($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);

            return $url[$arrayIndex];
        }
    }
}