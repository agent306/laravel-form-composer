<?php
namespace Agent306\FormComposer;

class Composer {
    public function create($name, $description, $url, $method) {
        return new Form($name, $description, $url, $method);
    }
}