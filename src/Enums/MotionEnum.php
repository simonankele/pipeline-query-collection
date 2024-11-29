<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Enums;

enum MotionEnum: string
{
    case FIND = 'find';
    case TILL = 'till';
}
