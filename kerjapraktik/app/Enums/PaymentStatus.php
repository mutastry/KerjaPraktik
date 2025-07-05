<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING = 'pending';
    case WAITING_VERIFICATION = 'waiting_verification';
    case VERIFIED = 'verified';
    case FAILED = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::WAITING_VERIFICATION => 'Waiting Verification',
            self::VERIFIED => 'Verified',
            self::FAILED => 'Failed',
        };
    }

public function color(): string
    {
        return match ($this) {
            self::PENDING => 'yellow',
            self::WAITING_VERIFICATION => 'blue',
            self::VERIFIED => 'green',
            self::FAILED => 'red',
        };
    }
}

    