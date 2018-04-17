<?php

class RevisionRobots {
	
	private $url;
	private $directives;
	public $response;
	public $messages;
	public $numHost = 0;
	
	const FILE_MAX_SIZE = 32768;  //32Кб;
	const SUCCESS_CODE_RESPONSE = 200;
	const STYLE_SUCCESS = 'background: #339866';
	const STYLE_WRONG = 'background: #FF8080';
	const STATUS_SUCCESS = 'Ок';
	const STATUS_WRONG = 'Ошибка';
	const NUMBER_HOST_SUCCESS = 1;
	const RECOMMENDATION_SUCCESS = 'Доработки не требуются';
	
	public function __construct(Url $url)
	{
		$this->url = $url;
		$this->messages = parse_ini_file('messages.ini', true);
	}
	
	public function getDirectives()
    {
        $this->directives = @file($this->url->pathFile);
		if (false === $this->directives) {
            throw new Exception("Файл ".$this->url->pathFile." не существует или не может быть загружен.");
        }
        return $this;
    }
	
	public function checkSizeFile()
	{
		if ($this->url->sizeFile <= self::FILE_MAX_SIZE) {
			$this->response['file_size'] = $this->setSuccessOptions('file_size');
		}
		else $this->response['file_size'] = $this->setWrongOptions('file_size');
		
		$this->response['file_size']['description'] = str_replace('%', $this->url->sizeFile.'kb', $this->response['file_size']['description']);
		return $this;
	}
	
	public function checkCodeResponce()
	{
		if ($this->url->codeResponse === self::SUCCESS_CODE_RESPONSE) {
			$this->response['code_response'] = $this->setSuccessOptions('code_response');
		}
		else $this->response['code_response'] = $this->setWrongOptions('code_response');
		return $this;
	}
	
	public function checkExistFile()
	{
		if (empty($this->directives)) {
			$this->response['exist_file'] = $this->setWrongOptions('exist_file');
		}
		else $this->response['exist_file'] = $this->setSuccessOptions('exist_file');
		return $this;
	}
	
	public function checkExistDirectivesSitemap()
	{
		foreach ($this->directives as $directive) {
			$directive = strtolower($directive);
			if (false !== strpos($directive, 'sitemap')) {
				$this->response['exist_sitemap'] = $this->setSuccessOptions('exist_sitemap');
				break;
			}
		}
		$this->response['exist_sitemap'] = $this->setWrongOptions('exist_sitemap');
		return $this;
	}
	
	public function checkNumberOfDirectivesHost()
	{
		if (!$this->numHost) return $this;
		if ($this->numHost == self::NUMBER_HOST_SUCCESS) {
			$this->response['count_host'] = $this->setSuccessOptions('count_host');
		}
		else $this->response['count_host'] = $this->setWrongOptions('count_host');
		return $this;
	}
	
	public function checkExistDirectiveHost()
	{
		if ($this->numHost) {
			$this->response['exist_host'] = $this->setSuccessOptions('exist_host');
		}
		else $this->response['exist_host'] = $this->setWrongOptions('exist_host');
		return $this;
	}

	private function countDirectivesHost()
	{
		$hosts = [];
		foreach ($this->directives as $directive) {
			$directive = strtolower($directive);
			if (false !== strpos($directive, 'host')) $hosts[] = $directive;
		}
		$this->numHost = count($hosts);
		return $this;
	}
	
	private function setSuccessOptions($key)
	{ 
		$options['status'] = self::STATUS_SUCCESS;
		$options['style'] = self::STYLE_SUCCESS;
		$options['description'] = $this->messages[$key]['success'];
		$options['recommendation'] = self::RECOMMENDATION_SUCCESS;
		return $options;
	}
	
	private function setWrongOptions($key)
	{ 
		$options['status'] = self::STATUS_WRONG;
		$options['style'] = self::STYLE_WRONG;
		$options['description'] = $this->messages[$key]['wrong'];
		$options['recommendation'] = $this->messages[$key]['recommendation'];
		return $options;
	}
	
}