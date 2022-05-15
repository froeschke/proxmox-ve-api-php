<?php

namespace VineVax\PVE\Qemu\Snapshot;

use VineVax\PVE\Proxmox;
use VineVax\PVE\Qemu\Base;

class Snapshot
{
    public function __construct(
        public string $node,
        public int $vmid,
        public string $snapname
    ) {}

    public function config(): Config
    {
        return new Config($this->node, $this->vmid, $this->snapname);
    }

    public function rollback(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/snapshot/{$this->snapname}/rollback", $options)
        );
    }
}
