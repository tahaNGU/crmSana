<?php

namespace Modules\Task\Enums;

use Illuminate\Validation\Rules\Enum;

enum Status: string {
    case TODO = 'todo';
    case PROGRESS = 'in_progress';
    case DONE = 'done';
}
