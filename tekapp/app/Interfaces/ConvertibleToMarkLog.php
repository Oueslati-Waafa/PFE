<?php
/**
 * Created by PhpStorm.
 * User: wassim
 * Date: 09/02/19
 * Time: 15:07
 */

namespace App\Interfaces;


use App\MarkLog;
use App\MarkTransaction;

interface ConvertibleToMarkLog
{
  function getMarkLogInstance(MarkTransaction $markTransaction): MarkLog;
}