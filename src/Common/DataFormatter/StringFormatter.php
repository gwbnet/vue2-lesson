<?php
namespace Wslim\Common\DataFormatter;

use Wslim\Common\DataFormatterInterface;

class StringFormatter implements DataFormatterInterface
{
	/**
	 * Encode data
	 *
	 * @param   mixed  $data
	 *
	 * @throws \InvalidArgumentException
	 * @return  string
	 */
	static public function encode($data)
	{
		if (is_array($data) || (is_object($data) && !method_exists($data, '_toString')))
		{
			throw new \InvalidArgumentException(__CLASS__ . ' can not handle an array or non-stringable object.');
		}

		return $data;
	}

	/**
	 * Decode data
	 *
	 * @param   string  $data
	 *
	 * @return  mixed
	 */
	static public function decode($data)
	{
		return $data;
	}
	
	static public function append($old, $new)
	{
	    return $old . $new;
	}
}

