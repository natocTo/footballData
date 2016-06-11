<?php

namespace NatocTo\FootballData\Model;

use NatocTo\FootballData\Content;

abstract class BaseModel {

	protected $content;

    public function __construct(Content $content) {

        $this->content = $content;
    }
}