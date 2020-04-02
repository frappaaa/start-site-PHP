<?php

  // GENERAL FUNCTIONS

  function findAll($options=[]) {
    global $db;

    $db_name = $options['db_name'] ?? '';
    $orderBy = $options['order'] ?? 'id';

    if(isset($db_name)){

        $sql = "SELECT * FROM ".$db_name." ";
        $sql .= "ORDER BY ".$orderBy." ASC";

        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }
  }

  function insert($insert=[], $options=[]){
    global $db;

    $db_name = $options['db_name'] ?? '';

    if (isset($db_name)) {
        $sql = "INSERT INTO ".$db_name." ";
        $sql.= "(`title`, `subtitle`, `visible`, `descr`, `quote`, `cit`) ";
        $sql.= "VALUES (";
        $sql .= "'".db_escape($db, $insert['title'])."', ";
        $sql .= "'".db_escape($db, $insert['subtitle'])."', ";
        $sql .= "'".db_escape($db, $insert['visible'])."', ";
        $sql .= "'".db_escape($db, $insert['descr'])."', ";
        $sql .= "'".db_escape($db, $insert['quote'])."', ";
        $sql .= "'".db_escape($db, $insert['cit'])."' ";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }
  }

  function findBy($search=[], $options=[]) {
    global $db;

    $db_name = $options['db_name'] ?? '';

    if (isset($db_name)) {
        $sql = "SELECT * FROM ".$db_name." ";
        $sql .= "WHERE id='" . db_escape($db, $search['id']) . "' ";
        
        
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }
  }
  
  

  function delete($delete=[],$options=[]) {
    global $db;

    $db_name = $options['db_name'] ?? '';
    if (isset($db_name)) {
        $sql = "DELETE FROM ".$db_name." ";
        $sql .= "WHERE id='" . db_escape($db, $delete['id']) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
  }

  function update($update=[],$options=[]){
    global $db;
    $db_name = $options['db_name'] ?? '';
    if (isset($db_name)) {
        $sql = "UPDATE ".$db_name." ";
        $sql.= "(`title`, `subtitle`, `visible`, `descr`, `quote`, `cit`) ";
        $sql.= "VALUES (";
        $sql .= "'".db_escape($db, $update['title'])."', ";
        $sql .= "'".db_escape($db, $update['subtitle'])."', ";
        $sql .= "'".db_escape($db, $update['visible'])."', ";
        $sql .= "'".db_escape($db, $update['descr'])."', ";
        $sql .= "'".db_escape($db, $update['quote'])."', ";
        $sql .= "'".db_escape($db, $update['cit'])."' ";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
  }
  

?>