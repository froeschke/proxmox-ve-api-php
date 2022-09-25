<?php

namespace VineVax\PVE;

use VineVax\PVE\Exceptions\NotImplementedException;
use VineVax\PVE\Qemu\Agent;
use VineVax\PVE\Qemu\CloudInit;
use VineVax\PVE\Qemu\Config;
use VineVax\PVE\Qemu\Firewall;
use VineVax\PVE\Qemu\Migrate;
use VineVax\PVE\Qemu\Snapshot\Snapshot;
use VineVax\PVE\Qemu\Status;

class Qemu
{
    public function __construct(
        private string $node,
        public ?int $vmid = null,
    ) { }

    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu", $options)
        );
    }

    public function post(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu", $options)
        );
    }

    public function delete(array $options = [])
    {
        return Proxmox::json(
            Proxmox::delete("nodes/{$this->node}/qemu/{$this->vmid}", $options)
        );
    }

    public function agent(): Agent
    {
        return new Agent($this->node, $this->vmid);
    }

    public function cloudInit(): CloudInit
    {
        return new CloudInit($this->node, $this->vmid);
    }

    public function firewall(): Firewall
    {
        return new Firewall($this->node, $this->vmid);
    }

    public function snapshot(): Snapshot
    {
        return new Snapshot($this->node, $this->vmid);
    }

    public function status(): Status
    {
        return new Status($this->node, $this->vmid);
    }

    public function clone(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/clone", $options)
        );
    }

    public function config(): Config
    {
        return new Config($this->node, $this->vmid);
    }

    public function feature(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/feature", $options)
        );
    }

    public function migrate(): Migrate
    {
        return new Migrate($this->node, $this->vmid);
    }

    public function monitor(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/monitor", $options)
        );
    }

    public function moveDisk(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/move_disk", $options)
        );
    }

    public function pending(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/pending", $options)
        );
    }

    public function resize(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/qemu/{$this->vmid}/resize", $options)
        );
    }

    public function rrd(array $options = [])
    {
        throw new NotImplementedException();
    }

    public function rrddata(array $options = [])
    {
        $timeframe = $options['timeframe'] ?? 'day';
        $cf = $options['cf'] ?? 'MAX';
        unset($options['timeframe'], $options['cf']);

        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/rrddata?timeframe={$timeframe}&cf={$cf}", $options)
        );
    }

    public function sendkey(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/qemu/{$this->vmid}/sendkey", $options)
        );
    }

    public function spiceproxy(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/spiceproxy", $options)
        );
    }

    public function template(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/template", $options)
        );
    }

    public function termproxy(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/termproxy", $options)
        );
    }

    public function unlink(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/qemu/{$this->vmid}/unlink", $options)
        );
    }

    public function vncproxy(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/vncproxy", $options)
        );
    }

    public function vncwebsocket(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/vncwebsocket", $options)
        );
    }
}
