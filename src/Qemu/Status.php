<?php

namespace VineVax\PVE\Qemu;

use VineVax\PVE\Proxmox;

class Status extends Base
{

    public function current()
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/status/current")
        );
    }

    public function reboot()
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/status/reboot")
        );
    }

    public function reset()
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/status/reset")
        );
    }

    public function resume()
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/status/resume")
        );
    }

    public function shutdown()
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/status/shutdown")
        );
    }

    public function start()
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/status/start")
        );
    }

    public function stop()
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/status/stop")
        );
    }

    public function suspend()
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/status/suspend")
        );
    }
}
