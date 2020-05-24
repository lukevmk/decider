<?php
/**
 * Decider
 * 
 * Responsible for making a decision which app must execute the request.
 * Firstly, by checking a query parameter
 * Secondly, by comparing defined routes with the request URL. The defined routes are stored in json files.
 */
class Decider
{
    /**
     * @var array 
     */
    private $registeredUris = [];

    /**
     * @var array
     * Use a tool like https://www.freeformatter.com/json-escape.html
     * to genereate an escaped regex string which meets the json syntax
     */
    private $regexUris = []; 

    /** 
     * @var array 
     */
    private $appDefinitions;

    public function __construct(array $appDefinitions)
    {
        $this->appDefinitions = $appDefinitions;
    }

    /**
     * Get the executing app
     * 
     * @param string $requestUrl
     * @return string
     */
    public function getExecutingApp(string $requestUrl) : String
    {
        // check based on query parameter 'executing_app'
        if($_GET['executing_app'] === $this->appDefinitions['new_app'])
        {
            return $this->appDefinitions['new_app'];
        }
        else if($_GET['executing_app'] === $this->appDefinitions['old_app'])
        {
            return $this->appDefinitions['old_app'];
        }

        // strip the url from get parameteres
        $requestUrl = parse_url($requestUrl, PHP_URL_PATH);

        $this->parseUriJsons();

        // Check if url presents in registered uris array
        if(in_array($requestUrl, $this->registeredUris))
        {
            return $this->appDefinitions['new_app'];
        }

        // Check if url presents in variable registered uris array url bases on regexes
        foreach ($this->regexUris as $regexUri) {
            if(preg_match($regexUri , $requestUrl) > 0)
            {
                return $this->appDefinitions['new_app'];
            }
        }

        // If url is not registered return the old app
        return $this->appDefinitions['old_app'];
    }

    /**
     * Reads json files which contain defined urls and converts it into arrays
     */
    private function parseUriJsons()
    {
        // static URLs
        $string = file_get_contents(__DIR__ . '/storage/registeredUris.json');
        $this->registeredUris = json_decode($string, true)['uris'] ?? [];

        // variable URLs defined as regexes
        $string = file_get_contents(__DIR__ . '/storage/regexUris.json');
        $this->regexUris = json_decode($string, true)['uris'] ?? [];
    }
}