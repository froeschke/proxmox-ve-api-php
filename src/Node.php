<?php

namespace VineVax\PVE;

use VineVax\PVE\Node\Storage\Storage;

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

    public function qemu(int $vmid = null)
    {
        return new Qemu($this->node, $vmid);
    }

    public function storage(string $storage)
    {
        return new Storage($this->node, $storage);
    }

    public function get()
    {
        return Proxmox::json(
            Proxmox::get("nodes")
        );
    }
}
