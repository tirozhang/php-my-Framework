<?php

namespace Tiro\Exception;

use RuntimeException;
use Interop\Container\Exception\NotFoundException as InteropNotFoundException;

class ContainerValueNotFoundException extends RuntimeException implements InteropNotFoundException
{
}


// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
