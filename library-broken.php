<?php

require_once('Book.php');

$books = [
    1 => [
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'status' => 'available'
    ],
    2 => [
        'title' => '1984',
        'author' => 'George Orwell',
        'status' => 'not available'
    ],
    3 => [
        'title' => 'Pride and Prejudice',
        'author' => 'Jane Austen',
        'status' => 'available'
    ]
];

function showAllBooks(&$books) {
    foreach ($books as $id => $book) {
        displayBook($id, $book);
    }
}

function showBook(&$books) {
    $id = readline("Enter book id: ");
    displayBook($id, $books[$id]);
}

function addBook(&$books) {
    $title = readline("Enter title: ");
    $author = readline("Enter author: ");
    $books[] = ['title' => $title, 'author' => $author, 'status' => 'available'];
}

function addDebugBook() {
    $title = readline("Enter title: ");
    $author = readline("Enter author: ");
    $a = new Book($title, $author, 'available');
    print_r($a);
}

function deleteBook(&$books) {
    $id = readline("Enter book ID you want to delete: ");
    unset($books[$id]);
}

function displayBook($id, $book) {
    echo "ID: {$id} // Title: ". $book['title'] . " // Author: " . $book['author']. " // Status: " . $book['status'] . "\n\n";
}

function displayDebugBook() {
    echo $a->display();
}

function setStatus(&$books) {
    $id = readline("Enter book id: ");
    $status = readline("Enter new book status: ");
    if ($status != "available" && $status != "not available") {
        echo "Incorrect status, can be only available or not available";
        return;
    }
    $books[$id]['status'] = $status;
    
}


echo "\n\nWelcome to the Library\n";

$continue = true;
do {
    echo "\n\n";
    echo "1 - show all books\n";
    echo "2 - show a book\n";
    echo "3 - add a book\n";
    echo "4 - delete a book\n";
    echo "5 - set status\n";
    echo "6 - quit\n\n";
    $choice = readline();

    switch ($choice) {
        case 1:
            showAllBooks($books);
            break;
        case 2:
            showBook($books);
            break;
        case 3:
            addBook($books);
            break;
        case 4:
            deleteBook($books);
            break;
        case 5:
            setStatus($books);
            break;
        case 6:
            echo "Goodbye!\n";
            $continue = false;
            break;
        case 10:
            addDebugBook();
            break;
        case 11:
            displayDebugBook();
            break;
        case 13:
            print_r($books); // hidden option to see full $books content
            break;
        default:
            echo "Invalid choice\n";
    };

} while ($continue == true);