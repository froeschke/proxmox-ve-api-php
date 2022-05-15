<?php

namespace VineVax\PVE\Qemu;

use VineVax\PVE\Proxmox;

class Migrate extends Base
{
    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/migrate", $options)
        );
    }

    public function post(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/migrate", $options)
        );
    }
}
