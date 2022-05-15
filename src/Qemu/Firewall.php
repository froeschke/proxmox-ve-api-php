<?php

namespace VineVax\PVE\Qemu;

use VineVax\PVE\Proxmox;

class Firewall extends Base
{
    public function log()
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/firewall/log")
        );
    }

    public function refs(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/firewall/refs", $options)
        );
    }
}
