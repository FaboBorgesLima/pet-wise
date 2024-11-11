<?php

namespace App\Models;

class Request
{
    public string $path = '';
    public string $method = '';
    public array $post = [];
    public array $get = [];

    public function __construct(string $path, string $method, array $post, array $get)
    {
        $this->path = $path;
        $this->method = $method;
        $this->post = $post;
        $this->get = $get;
    }
}
