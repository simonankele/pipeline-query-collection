<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Enums;

enum WildcardPositionEnum: string
{
    case BOTH = 'both';
    case LEFT = 'left';
    case RIGHT = 'right';
}
