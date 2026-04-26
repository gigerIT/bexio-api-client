<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Email;

use Bexio\Resources\Resource;

class Email extends Resource
{
    public function __construct(
        #[\Spatie\LaravelData\Attributes\Validation\Email]
        public string $recipient_email,
        public string $subject,
        public string $message,
        public ?bool $mark_as_open = null,
        public ?bool  $attach_pdf = true,
    )
    {
    }

    public function toDocumentPayload(): array
    {
        return array_filter([
            'recipient_email' => $this->recipient_email,
            'subject' => $this->subject,
            'message' => $this->message,
            'mark_as_open' => $this->mark_as_open,
            'attach_pdf' => $this->attach_pdf,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function toReminderPayload(): array
    {
        return [
            'recipient_email' => $this->recipient_email,
            'subject' => $this->subject,
            'message' => $this->message,
        ];
    }
}
