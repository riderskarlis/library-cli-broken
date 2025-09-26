<?php

    class Book {
        public $title;
        public $author;
        public $status;

        public function __construct($title, $author, $status) {
            $this->title = $title;
            $this->author = $author;
            $this->status = $status;
        }

        public function display() {
            return "Title: " . $title . ", Author: " . $author . ", Status: " . $status;
        }

        public function setStatus($newstatus) {
            $this->status = $newstatus;
        }
    }

    $a = new Book('', '', '');

?>