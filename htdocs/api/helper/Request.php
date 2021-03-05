<?php namespace Avalihub;

use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;

class Request
{
    /**
     * URL of given request.
     * @var string
     */
    private string $url;

    /**
     * Explosion from $url.
     * @var array
     */
    private array $parts;

    /**
     * Request Type of given request.
     * @var string
     */
    private string $type;

    /**
     * JSON Object of given request.
     * @var object
     */
    private object $json;

    /**
     * Files that were sent with the request.
     * @var array
     */
    private array $files;

    /**
     * @param array $server
     * @param string $dataInput Default: 'php://input'.
     */
    function __construct(array $server, string $dataInput = 'php://input')
    {
        $this->url = str_replace(parse_url($_ENV['API'], PHP_URL_PATH), '', $server['REQUEST_URI']);
        $this->type = strtoupper($server['REQUEST_METHOD']);
        if (json_decode(file_get_contents($dataInput)) === null) {
            if ($this->isPOST()) {
                $this->json = json_decode(json_encode($_POST));
            }
        } else {
            $this->json = json_decode(file_get_contents($dataInput));
        }
        $this->files = $_FILES;

        $this->parts = explode('/', $this->url);
    }

    /**
     * Checks the given request for a regular expression
     * @param string $regex Regular expression
     * @return bool
     */
    public function check(string $regex): bool
    {
        return preg_match($regex, $this->url) === 1;
    }

    /**
     * Returns a part of the given requests URL
     * @param int $index Index of returned part.
     * 0 equals to the element before the first slash.
     * This should return an empty string.
     * @return string
     */
    #[Pure] public function getPart(int $index): string
    {
        return $this->getParts()[$index];
    }

    /**
     * Returns an array with all parts of the given request URL exploded at '/'.
     * @return array
     */
    #[Pure] public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * Returns the JSON Object of the given request
     * @return object
     */
    public function getData(): object
    {
        $json = clone $this->json;

        foreach ($json as $key => $value) {
            if ($value === "") {
                $json->$key = null;
            }
        }

        return $json;
    }

    /**
     * Checks if the given request is of type GET.
     * @return bool
     */
    #[pure] public function isGET(): bool
    {
        return $this->type === "GET";
    }

    /**
     * Checks if the given request is of type PUT.
     * @return bool
     */
    #[pure] public function isPUT(): bool
    {
        return $this->type === "PUT";
    }

    /**
     * Checks if the given request is of type POST.
     * @return bool
     */
    #[pure] public function isPOST(): bool
    {
        return $this->type === "POST";
    }

    /**
     * Checks if the given request is of type DELETE.
     * @return bool
     */
    #[pure] public function isDELETE(): bool
    {
        return $this->type === "DELETE";
    }

    /**
     * Returns the files sent with the request.
     * Similar to $_FILES.
     */
    #[pure] public function getUploadedFiles(): array
    {
        return $this->files;
    }

    /**
     * Sends a bad request back. Consists of error code 501
     * and JSON encoded url.
     */
    #[NoReturn] public function badRequest()
    {
        echo json_encode($this->url);
        http_response_code(501);
        die(`Invalid request: ${this->type} ${this->url} ` . json_encode($this->json));
    }
}
