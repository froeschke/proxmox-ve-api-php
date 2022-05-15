<?php

namespace VineVax\PVE\Qemu;

use VineVax\PVE\Proxmox;

class Config extends Base
{
    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/config", $options)
        );
    }

    public function post(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/config", $options)
        );
    }

    public function put(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/qemu/{$this->vmid}/config", $options)
        );
    }
}
