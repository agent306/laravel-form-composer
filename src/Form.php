<?php
namespace Agent306\FormComposer;

class Form {
    protected $url;
    protected $name;
    protected $method;
    protected $description;
    protected $fields = [];

    public function __construct ($name, $description, $url, $method) {
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
        $this->method = $method;
    }

    public function add(string $label, string $name, string $type = Field::TEXT, array $options = []) {
        $this->fields[] = [
            "label" => $label,
            "name" => $name,
            "type" => $type,
            "options" => $options
        ];
        return $this;
    }

    public function build(): array {
        return [
            "url" => $this->url,
            "name" => $this->name,
            "method" => $this->method,
            "description" => $this->description,
            "fields" => $this->fields,
        ];
    }
}