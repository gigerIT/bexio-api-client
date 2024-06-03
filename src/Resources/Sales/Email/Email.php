<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Email;

use Bexio\Resources\Resource;

class Email extends Resource
{
    public function __construct(
        public string $recipient_email,
        public string $subject,
        public string $message,
        public string $mark_as_open,
        public ?bool  $attach_pdf = true,
    )
    {
    }
}