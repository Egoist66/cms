<?php

namespace Engine\Utils\VarDumper;

enum VarDumperTypes
{
    case Dump;
    case Print;
    case Debug;

    case JSON;

    case Danger;
}