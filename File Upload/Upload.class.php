<?php
// ----------------------------------------------------------------------------
// Upload_class
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


  <?php

   include_once('php_upload.php');

                            
   $upload = new PhpUpload;
   $upload->FullDisplay(true);  // << To Display Full Form
   $upload->SetUploadDir('./'); // << Set Upload directory
   $upload->ReturnBool(false); // << Class returns only true, false

   $upload->SetExts('jpg|gif|ini');
   //$upload->NewName('subor.jpg'); // Set new filename

   //$upload->ReturnOutput(true); << Return Output
   $upload->SetMaxSize(2000); // << Max File Size in KB
   $upload->SetErrorTypes('Obmedzuje php.ini', 'Nastala chyba!', 'Zly format!', 'Subor nesmie byt vecsi ako $ kB');   // << Client error types

   $upload->ShowUpload('PhpUpload1');

   $upload->TryUpload(); // << If isset try upload file


  ?>

<?php

//****************************
//  Simple PhpUpload Class   |
//     Writed 14.12.2010     |
//     Slavomir Mikolaj      |
//***************************|

 class PhpUpload {

   public $Var_ReturnOutput = false;
   public $Var_ext = array();
   public $Var_FullDisplay = false;
   public $Var_InstanceName = 'Upload1';
   public $Var_MsgError = 'Error occured';
   public $Var_MsgDone = 'Completed!';
   public $Var_UploadDir = '/';
   public $Var_ErrorTypes = array();
   public $Var_ReturnBool = false;
   public $Var_Ext = array();
   public $Var_MaxSize = 0;
   public $Ext = '';
   public $Var_NewName = '';

   public function SetExts($array) {
    $node_array = explode('|', $array);

    foreach($node_array as $item) {
     array_push($this->Var_Ext, $item);
    }
   }

   public function SetMaxSize($int) {
    $this->Var_MaxSize = $int * 1000;
   }

   public function NewName($str) {
    $this->Var_NewName = $str;
   }

   public function SetErrorTypes($type1, $type2, $type3, $type4) {

    $type4 = str_replace(array('$'), array($this->Var_MaxSize / 1000), $type4);
    $this->Var_ErrorTypes = array(1=>$type1, 6=>$type2, 19=>$type3, 20=>$type4);

   }

   public function ReturnBool($bool) {
    $this->Var_ReturnBool = $bool;
   }

   public function ReturnOutput($bool) {
    $this->Var_ReturnOutput = $bool;
   }

   public function FullDIsplay($bool) {
    $this->Var_FullDisplay = $bool;
   }

   public function SetUploadDir($dir) {
    $this->Var_UploadDir = $dir;
   }


   function ShowUpload($instance, $uploadfile = '', $formid = 'uploadform', $submitvalue = 'Upload') {
    global $Var_FullDisplay;
    global $Var_ReturnOutput;
    global $Var_InstanceName;
    global $Var_UploadDir;

    $Var_InstanceName = $instance;
    $a='';

     if($this->Var_FullDisplay == true) {
       $a .= '<form method="post" id="'.$formid.'" action="'.$uploadfile.'" enctype="multipart/form-data">';
       $a .= '<input type="file" name="'.$instance.'"/>';
       $a .= '<input type="submit" value="'.$submitvalue.'" name="upload" />';
       $a .= '</form>';
     }else {
       $a .= '<input type="file" name="'.$instance.'"/>';
     }

     if($Var_ReturnOutput != true) {
      echo $a;
     }else {
      return $a;
     }
   }

   function TryUpload() {
    global $Var_InstanceName;
    global $Var_UploadDir;

     $FalseUpload = false;


    if(strlen($this->Var_UploadDir) <= 0) {
     if(!$this->Var_ReturnOutput) {

     if($this->Var_ReturnBool) {return false; exit;}

      echo 'System error: nothing upload folder';
       exit;

     }else {

      return 'System error: nothing upload folder';
       exit;
     }
    }

    if(isset($_FILES[$Var_InstanceName]) && strlen($_FILES[$Var_InstanceName]['name'])>0) {

     if($_FILES[$Var_InstanceName]['error'] > 0) {

      if($this->Var_ReturnBool) {return false; exit;}

      if(!$this->Var_ReturnOutput) {
       echo $this->Var_ErrorTypes[$_FILES[$Var_InstanceName]['error']];
        exit;
      }else {
       return $this->Var_ErrorTypes[$_FILES[$Var_InstanceName]['error']];
        exit;
      }

     }
       //
     if($_FILES[$Var_InstanceName]['size'] > $this->Var_MaxSize) {

       if($this->Var_ReturnBool) {return false; exit;}

       if(!$this->Var_ReturnOutput) {
        echo $this->Var_ErrorTypes[20];
       }else {
        return $this->Var_ErrorTypes[20];
       }
       exit;
     }
       //
      $node_array = explode('.', $_FILES[$Var_InstanceName]['name']);
      $fExt = strtolower(end($node_array));
      $this->Ext = $fExt;

      if(!in_array($fExt, $this->Var_Ext)) {

       if($this->Var_ReturnBool) {return false; exit;}

      if(!$this->Var_ReturnOutput) {
        echo $this->Var_ErrorTypes[19];
       }else {
        return $this->Var_ErrorTypes[19];
       }
       exit;
      }

     try {

      if(strlen($this->Var_NewName)>0) {
       $process = move_uploaded_file($_FILES[$Var_InstanceName]['tmp_name'], $this->Var_UploadDir.$this->Var_NewName);
      }else {
       $process = move_uploaded_file($_FILES[$Var_InstanceName]['tmp_name'], $this->Var_UploadDir.basename($_FILES[$Var_InstanceName]['name']));
      }

      if($process) {

       if($this->Var_ReturnBool) {return true; exit;}

       if(!$this->Var_ReturnOutput) {
        echo $this->Var_MsgDone;
        }else {

       return $this->Var_MsgDone;

       }
      }

     } catch (Exception $e) {

       if($this->Var_ReturnBool) {return false; exit;}

       if(!$this->Var_ReturnOutput) {
        echo $this->Var_MsgError.': '.$e;
       }else {
        return $this->Var_MsgError.': '.$e;
       }
      }
    }
   }
 }

?>




