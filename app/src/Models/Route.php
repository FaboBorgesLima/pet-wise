<?php


namespace App\Models;


class Route
{
    public string $path = '';
    private $cl;
    private string $cl_method;
    public string $method;

    public function __construct(string $path, string $method, $cl, string $cl_method)
    {
        $this->path = $path;
        $this->cl = $cl;
        $this->cl_method = $cl_method;
        $this->method = $method;
    }

    public function run(Request $request)
    {
        call_user_func($this->cl . "::" . $this->cl_method, $request);
    }
}
