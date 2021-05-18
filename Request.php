<?php


class Request
{
    private array $query;
    private array $request;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->query = $_GET;
        $this->request = $_POST;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function getQuery(string $name)
    {
        return $this->query[$name] ?? null;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function getRequest(string $name)
    {
        return $this->request[$name] ?? null;
    }

}