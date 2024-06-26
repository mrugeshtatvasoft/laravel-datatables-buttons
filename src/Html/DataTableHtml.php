<?php

namespace mrugeshtatvasoft\DataTables\Html;

use BadMethodCallException;
use mrugeshtatvasoft\DataTables\Contracts\DataTableHtmlBuilder;

/**
 * @mixin Builder
 */
abstract class DataTableHtml implements DataTableHtmlBuilder
{
    protected ?Builder $htmlBuilder = null;

    public static function make(): Builder
    {
        if (func_get_args()) {
            return (new static(...func_get_args()))->handle();
        }

        /** @var static $html */
        $html = app(static::class);

        return $html->handle();
    }

    /**
     * @return \mrugeshtatvasoft\DataTables\Html\Builder
     *
     * @throws \Exception
     */
    public function __call(string $method, mixed $parameters)
    {
        if (method_exists($this->getHtmlBuilder(), $method)) {
            return $this->getHtmlBuilder()->{$method}(...$parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exists");
    }

    protected function getHtmlBuilder(): Builder
    {
        if ($this->htmlBuilder) {
            return $this->htmlBuilder;
        }

        return $this->htmlBuilder = app(Builder::class);
    }

    public function setHtmlBuilder(Builder $builder): static
    {
        $this->htmlBuilder = $builder;

        return $this;
    }
}
