<?php

namespace VineVax\PVE;

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

    public function get()
    {
        return Proxmox::json(
            Proxmox::get("nodes")
        );
    }
}
