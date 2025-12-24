<?php
namespace App\Enums;

enum TaskStatus: string {
    case TODO = 'à faire';
    case IN_PROGRESS = 'en cours';
    case DONE = 'terminée';
    
    public function badge(): string {
        return match($this) {
            self::TODO => 'secondary',
            self::IN_PROGRESS => 'warning',
            self::DONE => 'success',
        };
    }
}
