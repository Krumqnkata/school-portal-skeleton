
<?php

class User {
    private $row; // property за реда от БД

    public function __construct($row) {
        $this->row = $row;
    }

    public function user_view() {
        return isset($this->row['user_view']) && $this->row['user_view'] == 1;
    }

    public function user_edit() {
        return isset($this->row['user_edit']) && $this->row['user_edit'] == 1;
    }

    public function user_edit_role() {
        return isset($this->row['user_edit_role']) && $this->row['user_edit_role'] == 1;
    }

    public function user_delete(){
        return isset($this->row['user_edit_role']) && $this->row['user_edit_role'] == 1;
    }
}

?>