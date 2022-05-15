<?php

namespace VineVax\PVE\Qemu;

use VineVax\PVE\Proxmox;

class Agent extends Base
{
    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent", $options)
        );
    }

    public function post(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent", $options)
        );
    }

    public function exec(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/exec", $options)
        );
    }

    public function execStatus(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/exec-status", $options)
        );
    }

    public function fileRead(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/file-read", $options)
        );
    }

    public function fileWrite(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/file-write", $options)
        );
    }

    public function fsfreezeFreeze(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/fsfreeze-freeze", $options)
        );
    }

    public function fsfreezeStatus(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/fsfreeze-status", $options)
        );
    }

    public function fsfreezeThaw(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/fsfreeze-thaw", $options)
        );
    }

    public function fstrim(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/fstrim", $options)
        );
    }

    public function getFsinfo(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-fsinfo", $options)
        );
    }

    public function getHostName(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-host-name", $options)
        );
    }

    public function getMemoryBlockInfo(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-memory-block-info", $options)
        );
    }

    public function getMemoryBlocks(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-memory-blocks", $options)
        );
    }

    public function getOsinfo(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-osinfo", $options)
        );
    }

    public function getTime(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-time", $options)
        );
    }

    public function getTimezone(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-timezone", $options)
        );
    }

    public function getUsers(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-users", $options)
        );
    }

    public function getVcpus(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/get-vcpus", $options)
        );
    }

    public function info(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/info", $options)
        );
    }

    public function networkGetInterfaces(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/agent/network-get-interfaces", $options)
        );
    }

    public function ping(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/ping", $options)
        );
    }

    public function setUserPassword(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/set-user-password", $options)
        );
    }

    public function shutdown(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/shutdown", $options)
        );
    }

    public function suspendDisk(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/suspend-disk", $options)
        );
    }

    public function suspendHybrid(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/suspend-hybrid", $options)
        );
    }

    public function suspendRam(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/agent/suspend-ram", $options)
        );
    }
}
