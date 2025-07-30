<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CertificateGenerated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public string $imagePath;

    /**
     * Create a new event instance.
     */
    public function __construct(string $message, string $imagePath)
    {
        $this->message = $message;
        $this->imagePath = $imagePath;
    }

    /**
     * Get the name of the channel the event should broadcast on.
     */
    public function broadcastOn(): Channel
    {
        // Use a public channel for practice/testing
        return new Channel('certificate-status');
    }

    /**
     * Get the event name to broadcast.
     */
    public function broadcastAs(): string
    {
        return 'certificate.generated';
    }
    
}
