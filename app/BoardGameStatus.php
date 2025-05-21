<?php

namespace App;

enum BoardGameStatus : string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Denied = 'denied';
}
