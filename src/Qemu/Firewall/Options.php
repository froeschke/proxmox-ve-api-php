<?php

namespace VineVax\PVE\Qemu\Firewall;

use VineVax\PVE\Proxmox;
use VineVax\PVE\Qemu\Base;

class Options extends Base
{
    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/firewall/options", $options)
        );
    }

    public function put(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/qemu/{$this->vmid}/firewall/options", $options)
        );
    }
}
