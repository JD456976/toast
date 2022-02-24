<?php

namespace App\Enums;

enum AnnoucementTypes: string
{
    case success = 'success';
    case danger = 'danger';
    case info = 'info';
    case primary = 'primary';
    case secondary = 'secondary';
    case warning = 'warning';
}
