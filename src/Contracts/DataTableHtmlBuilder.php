<?php

namespace mrugeshtatvasoft\DataTables\Contracts;

interface DataTableHtmlBuilder
{
    /**
     * Handle building of dataTables html.
     *
     * @return \mrugeshtatvasoft\DataTables\Html\Builder
     */
    public function handle();
}
