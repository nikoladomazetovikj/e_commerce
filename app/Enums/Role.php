<?php

namespace App\Enums;

enum Role : int {

    case ADMIN = 1;
    case CUSTOMER = 2;
    case CONTENT_WRITER = 3;
    case MANAGER = 4;
    case COMPANY_USER = 5;
}
