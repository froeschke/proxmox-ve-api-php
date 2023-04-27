<?php

namespace VineVax\PVE;

use VineVax\PVE\Node\Storage\Storage;
use VineVax\PVE\Node\Task;

class Node
{
    public function __construct(
        public ?string $node
    ) { }

    public function status(): array
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/status")
        );
    }

    public function qemu(int $vmid = null): Qemu
    {
        return new Qemu($this->node, $vmid);
    }

    public function storage(string $storage = null): Storage
    {
        return new Storage($this->node, $storage);
    }

    public function tasks(): Task
    {
        return new Task($this->node);
    }

    public function get()
    {
        return Proxmox::json(
            Proxmox::get("nodes")
        );
    }
}
