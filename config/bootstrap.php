<?php

require __DIR__ . '/helpers.php';

function navbar(): array
{
    return [
        '/' => [
            'name' => 'Home',
            'heading' => 'Home',
        ],
        '/about.php' => [
            'name' => 'About',
            'heading' => 'About Us',
        ],
        '/contact.php' => [
            'name' => 'Contact',
            'heading' => 'Contact Us',
        ],
    ];
}

function heading(string $default = ''): string
{
    return navbar()[currentPage()]['heading'] ?? $default;
}
