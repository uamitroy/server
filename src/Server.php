<?php
namespace BubbleGum;

/**
 * @author Amit Roy
*/


interface Server {
 
     /**
       * @param string $diskPath
       * @method setDiskPath
       * @return object
       */
     public static function setDiskPath(string $diskPath) : object;

     /**
       * @param int $precision
       * @method setPrecision
       * @return object
       */
     public static function setPrecision(int $precision) : object;

     /**
       * @param bool $originanl
       * @method setRaw
       * @return object
       */
     public static function setRaw(bool $originanl) : object; 

     /**
       * @param null
       * @method getTotalSpace
       * @return 
       */
     public static function getTotalSpace();

     /**
       * @param null
       * @method getFreeSpace
       * @return 
       */
     public static function getFreeSpace();


}