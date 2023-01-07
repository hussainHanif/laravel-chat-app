<?php

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;

interface View extends Renderable
{
    /**
     * @param string $layout
     * @param array $data
     * @return $this
     */
    public function layout(string $layout, array $data);


    /**
     * @param array $data
     * @return $this
     */
    public function layoutData(array $data);
}
