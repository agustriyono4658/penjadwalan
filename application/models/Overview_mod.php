<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview_mod extends CI_model{

Public function hitungPelamar()
{   
    $query = $this->db->get('pelamar');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
}