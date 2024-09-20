<?php

namespace StudyCsr;

abstract class ModelTwo
{
    protected array $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes = []): void
    {
        $this->attributes = $attributes;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getAttribute(string $name): mixed
    {
        $value = $this->getAttributeValue($name);

        if ($this->hasGetMutator($name)) {
            return $this->mutateAttribute($name, $value);
        }

        return $value;
    }

    protected function hasGetMutator(string $name): bool
    {
        return method_exists($this, 'get'.$this->studly($name).'Attribute');
    }

    protected function mutateAttribute(string $name, mixed $value): mixed
    {
        return $this->{'get'.$this->studly($name).'Attribute'}($value);
    }

    public function getAttributeValue(string $name): mixed
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }
        return null;
    }

    public function setAttribute(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
    }

    public function __set(string $name, mixed $value): void
    {
        $this->setAttribute($name, $value);
    }

    public function __get(string $name): mixed
    {
        return $this->getAttribute($name);
    }

    public function __isset(string $name): bool
    {
        return isset($this->attributes[$name]);
    }

    public function __unset(string $name): void
    {
        unset($this->attributes[$name]);
    }

    private function studly(string $value): string
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));
        return str_replace(' ', '', $value);
    }
}
