<?php

namespace VineVax\PVE\Node;

use VineVax\PVE\Proxmox;

class Task
{
    public function __construct(
        private string $node,
    ) { }

    public function get(string $upid)
    {
        $upid = urlencode($upid);

        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/tasks/{$upid}")
        );
    }

    public function delete(string $upid)
    {
        $upid = urlencode($upid);

        return Proxmox::json(
            Proxmox::delete("nodes/{$this->node}/tasks/{$upid}")
        );
    }
}
