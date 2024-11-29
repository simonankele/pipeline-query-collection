<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Enums;

enum TrashOptionEnum: string
{
    case WITH = 'with';
    case WITHOUT = 'without';
    case ONLY = 'only';
}
