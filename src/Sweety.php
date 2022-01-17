<?php
namespace BubbleGum;

/**
 * @author Amit Roy
*/
use BubbleGum\Server;
use Exception;

class Sweety implements Server{
   
         /**
          * @var $precision
           */
          private static $precision = 1;
         /**
	   * @var bool $originanl
	   */
	   private static bool $originanl=FALSE;
	   
	   /**
	    * @var array $units
	    */
	   private static array $units = ['B', 'KB', 'MB', 'GB', 'TB'];
	   
	   /**
	    * @var string $diskPath
	    */
	   private static string $diskPath; 
	   
	   /**
	     * @param init $precision
	     * @method setPrecision
	     * @return object
	     */
	   public static function setPrecision( int $precision) : object {
	       self::$precision = $precision;
	       return new static;
	   }

	   /**
	     * @param string $diskPath
	     * @method setDiskPath
	     * @return object
	     */
	   public static function setDiskPath(string $diskPath) : object {
	       self::$diskPath = $diskPath;
	       return new static;
	   }

	   /**
	     * @param bool $originanl
	     * @method setRaw
	     * @return object
	     */
	   public static function setRaw(bool $originanl) : object {
	       self::$originanl = $originanl;
	       return new static;
	   }

	   /**
	     * @param null
	     * @method getTotalSpace
	     * @return 
	     */
	   public static function getTotalSpace() {
	       
	       $diskTotalSpace = @disk_total_space(self::$diskPath);

	       if ($diskTotalSpace === FALSE) {
	        
	           throw new Exception('Invalid directory path has been set.');

	       }

	       return self::$originanl ? $diskTotalSpace : self::getUnitsResolved($diskTotalSpace);

	   }

	   /**
	     * @param null
	     * @method getFreeSpace
	     * @return 
	     */
	   public static function getFreeSpace() {
	       
	       $diskFreeSpace = @disk_free_space(self::$diskPath);

	       if ($diskFreeSpace === FALSE) {
	        
	           throw new Exception('Invalid directory path has been set.');

	       }

	       return self::$originanl ? $diskFreeSpace : self::getUnitsResolved($diskFreeSpace);

	   }

	   /**
	     * @param null
	     * @method getUsedSpace
	     * @return 
	     */
	   public static function getUsedSpace() {
	       
	       try {
	          return round((100 - (self::getFreeSpace() / self::getTotalSpace()) * 100), self::$precision);
	       } catch (Exception $e) {

	          throw print($e->getMessage());

	       }

	   }

	   /**
	     * @param $diskBytes
	     * @method getUnitsResolved
	     * @return 
	     */
	   private static function getUnitsResolved($diskBytes) { 
	   
	        for($i = 0; $diskBytes >= 1024 && $i < count(self::$units) - 1; $i++ ) {
		  
		      $diskBytes /= 1024;
		  
		  }

		  return round($diskBytes, 1).' '.self::$units[$i];

	   }

}