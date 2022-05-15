<?php

namespace VineVax\PVE\Qemu\Snapshot;

use VineVax\PVE\Proxmox;
use VineVax\PVE\Qemu\Base;

class Config
{
    public function __construct(
        public string $node,
        public int $vmid,
        public string $snapname,
    ) {}

    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/snapshot/{$this->snapname}/config", $options)
        );
    }

    public function put(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/qemu/{$this->vmid}/snapshot/{$this->snapname}/config", $options)
        );
    }
}
