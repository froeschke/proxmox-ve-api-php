<?php

namespace VineVax\PVE\Qemu;

use VineVax\PVE\Proxmox;

class CloudInit extends Base
{
    public function dump(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/cloudinit/dump", $options)
        );
    }
}
