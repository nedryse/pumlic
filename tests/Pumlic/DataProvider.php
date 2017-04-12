<?php

namespace Pumlic;

trait DataProvider
{

	/**
	 * Standard set of values for testing string unsupported values
	 *
	 * @return array
	 */
	public static function unsupportedStringDataProvider()
	{
		return array(
			// <editor-fold defaultstate="collapsed" desc="array">
			array(array(), 'The %s expects to be string, array(0) given.'),
			// </editor-fold>
			// <editor-fold defaultstate="collapsed" desc="object">
			array((object) array(), 'The %s expects to be string, object stdClass given.'),
			// </editor-fold>
			// <editor-fold defaultstate="collapsed" desc="object">
			array(FALSE, 'The %s expects to be string, boolean given.'),
			// </editor-fold>
		);
	}

	/**
	 * Standard set of values for testing string already defined values
	 *
	 * @return array
	 */
	public static function alreadyDefinedStringDataProvider()
	{
		return array(
			// <editor-fold defaultstate="collapsed" desc="string">
			array('test', 'The Already defined %s expects to be null, string \'test\' given.'),
			// </editor-fold>
		);
	}

	/**
	 * Standard set of values for testing string supported values
	 *
	 * @return array
	 */
	public static function stringDataProvider()
	{
		return array(
			// <editor-fold defaultstate="collapsed" desc="[a-z] string">
			array('string'),
			// </editor-fold>
			// <editor-fold defaultstate="collapsed" desc="[a-Z] string">
			array('String'),
			// </editor-fold>
			// <editor-fold defaultstate="collapsed" desc="[a-Z0-9] string">
			array('String1234'),
			// </editor-fold>
			// <editor-fold defaultstate="collapsed" desc="UTF-8 string">
			array('ěščřžýáíéůúňťĚŠČŘŽÝÁÍÉŮÚŇŤ'),
			// </editor-fold>
			// <editor-fold defaultstate="collapsed" desc="Special characters string">
			array('~*!-.:/\\"\''),
			// </editor-fold>
		);
	}
}
