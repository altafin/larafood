<?php

namespace App\Tenant\Events;

use App\Models\{
    Tenant,
    User,
};
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TenantCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Return user created.
     *
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * Get tenant.
     */
    public function tenant(): Tenant
    {
        return $this->user->tenant;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
