<?php

namespace Bjerke\Bread\Models;

use Bjerke\Bread\Traits\BreadModelTrait;
use Bjerke\Bread\Traits\FieldDefinition;
use Bjerke\Bread\Traits\QueryBuilderModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BreadModel
 * @package Bjerke\Bread\Models
 *
 */
abstract class BreadModel extends Model
{
  use FieldDefinition;
  use QueryBuilderModelTrait;
  use BreadModelTrait;

  public function __construct(array $attributes = [])
  {
    if (self::$defineOnConstruct && !$this->isDefined()) {
      $this->compileDefinition();
    }

    parent::__construct($attributes);
  }

}
