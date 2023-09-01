<?php

namespace JDong;

interface RequestInterface
{
    public function getMethod();

    public function getParamJson();
}