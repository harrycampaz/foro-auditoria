<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Build extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbutil();
        $datos = $this->dbutil->optimize_table('rol');
        if ($datos['Msg_type'] != 'Error') {

            redirect('login');
        }
    }

    function index() {
        $sql = file_get_contents("midb.sql");

        /*
          Assuming you have an SQL file (or string) you want to run as part of the migration, which has a number of statements...
          CI migration only allows you to run one statement at a time. If the SQL is generated, it's annoying to split it up and create separate statements.
          This small script splits the statements allowing you to run them all in one go.
         */

        $sqls = explode(';', $sql);
        array_pop($sqls);

        foreach ($sqls as $statement) {
            $statement = $statement . ";";
            $this->db->query($statement);
        }
        redirect(main);
    }

}
