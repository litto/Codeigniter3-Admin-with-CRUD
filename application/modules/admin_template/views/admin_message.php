<?php

if ($this->session->flashdata('message')) { 

 echo '<div class="alert alert-block alert-success">'.$this->session->flashdata('message').'</div>';

} 
else if($this->session->flashdata('success'))
{

 echo '<div class="alert alert-block alert-success">'.$this->session->flashdata('success').'</div>';

}
else if($this->session->flashdata('error'))
{

 echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';

}
else if($this->session->flashdata('warning'))
{

 echo '<div class="alert alert-block alert-warning">'.$this->session->flashdata('warning').'</div>';

}else{

  if($message!=''){
  
  echo '<div class="alert alert-block alert-success">'.$message.'</div>';
}
}

 ?>