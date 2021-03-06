<?php

namespace Terminus\Iterators;

/**
 * Aplies one or more callbacks to an item before returning it.
 */
class Transform extends \IteratorIterator {

  private $transformers = array();

  public function add_transform( $fn ) {
    $this->transformers[] = $fn;
  }

  public function current() {
    $value = parent::current();

    foreach ( $this->transformers as $fn ) {
      $value = $fn( $value );
    }

    return $value;
  }
}

