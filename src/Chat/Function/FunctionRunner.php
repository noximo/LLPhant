<?php

namespace LLPhant\Chat\Function;

class FunctionRunner
{
    public static function run(FunctionInfo $functionInfo): string
    {
        if (! isset($functionInfo->jsonArgs)) {
            return $functionInfo->instance->{$functionInfo->name}();
        }
        if ($functionInfo->jsonArgs === '') {
            return $functionInfo->instance->{$functionInfo->name}();
        }
        $arguments = json_decode($functionInfo->jsonArgs, true, 512, JSON_THROW_ON_ERROR);

        return $functionInfo->instance->{$functionInfo->name}(...$arguments);
    }
}