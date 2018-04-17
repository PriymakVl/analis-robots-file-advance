<?php

class Url {
	
	private $url;
	private $scheme;
	public $host;
	public $pathFile;
	public $_header;
	public $codeResponse;
	public $sizeFile;
	
	public function __construct($url)
	{
		$this->url = $this->addScheme($url);
		$this->parse();
	}
	
	private function addScheme($url)
	{
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://".$url;
		}
		return $url;
	}
	
	public function parse()
	{
		$arrUrl = @parse_url($this->url);
        if (false === $arrUrl) {
            throw new Exception('Невозможно распарсить URL '.$this->url);
        }
		$this->host = $arrUrl['host'];
		$this->scheme = $arrUrl['scheme'];
	}
	
	public function validate() 
	{ 
		$result = filter_var($this->url, FILTER_VALIDATE_URL);
		if ($result === false) throw new Exception("Введенный URL {$this->url} содержит ошибки");
		return $this;
	}
	
	public function getPathFile($filename)
	{
		$this->pathFile = $this->scheme.'://'.$this->host.'/'.$filename;
		return $this;
	}

	public function getHeader()
	{
		$this->_header = get_headers($this->pathFile, 1);
		return $this;
	}
	
	public function getCodeResponse()
	{
		$this->codeResponse = (int) explode(" ", $this->_header[0])[1];
		return $this;
	}
	
	public function getSizeFile()
	{
		if ($this->codeResponse != 200) return $this;
		$this->sizeFile = $this->_header['Content-Length'];
		return $this;
	}
	
	
}