<?php

namespace VineVax\PVE\Qemu;

class Base
{
    public function __construct(
        public string $node,
        public int $vmid,
    ) { }
}
