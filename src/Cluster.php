<?php

namespace VineVax\PVE;

class Cluster
{
    public function status()
    {
        return Proxmox::json(
            Proxmox::get('cluster/status')
        );
    }

    public function resources()
    {
        return Proxmox::json(
            Proxmox::get('cluster/resources')
        );
    }

    public function nextId(): int
    {
        return Proxmox::json(
            Proxmox::get('cluster/nextid')
        );
    }

}
