
<?php

function createNavigation($page, $label) {
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    $class = ($currentPage === $page) ? 'active' : '';
    return "<li><a href='$page' class='$class'>$label</a></li>";
}