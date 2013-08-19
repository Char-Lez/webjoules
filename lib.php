function is_date($test)
{
  // Returns true if test is a date YYYY-MM-DD format, false otherwise
  //
  // $test is a string
  //
  // No globals
  //
  // Returns boolean
  //
  // Version 1 * Char-Lez Braden * 2008-10-28
  //  * Basic function
  //
  //
  if (!is_string($test))
  {
    throw new error(__FILE__, __LINE__, "Invalid type for test", gettype($test), NULL);
  } // if (!is_string($test))
  ///////////////////////////
  //
  $parts=explode('-', $test);
  if (count($parts)!=3)
  {
    return false;
  }
  //
  return checkdate($parts[1], $parts[2], $parts[0]);  // M-D-Y
} // function is_date($test)


function is_date_time($test)
{
  // Returns true if test is a date/time YYYY-MM-DD HH:MM:SS format, false otherwise
  //
  // $test is a string
  //
  // No globals
  //
  // Returns boolean
  //
  // Version 1 * Char-Lez Braden * 2009-10-21
  //  * Basic function
  //
  //
  if (!is_string($test))
  {
    throw new error(__FILE__, __LINE__, "Invalid type for test", gettype($test), NULL);
  } // if (!is_string($test))
  ///////////////////////////
  //
  $parts=explode(' ', $test);
  if (count($parts)!=2)
  {
    return false;
  }
  //
  return is_date($parts[0]) && is_time($parts[1]);
} // function is_date_time($test)




function is_digit($test)
{
  // Returns true if the test is a digit, false otherwise
  //
  // $test is a string length 1
  //
  // No globals
  //
  // returns boolean
  //
  //
  // Version 1 * Char-Lez Braden * 2009-07-24
  //  * Basic function
  //
  //
  if (!is_string($test))
  {
    throw new error(__FILE__, __LINE__, "Invalid type for test", gettype($test), NULL);
  } // if (!is_string($test))
  if (strlen($test)!=1)
  {
    throw new error(__FILE__, __LINE__, "Invalid length for test", strlen($test), NULL);
  }
  ///////////////////////////
  //
  if ((ord($test)<48) || (ord($test)>57))
  {
    return false;
  }
  return true;
} // function is_digit($test)


function is_letter($test)
{
  // Returns true if the test is an ascii character either case, false otherwise
  //
  // $test is a string length 1
  //
  // returns boolean
  //
  //
  if (!is_string($test))
  {
    throw new error(__FILE__, __LINE__, "Invalid type for test", gettype($test), NULL);
  } // if (!is_string($test))
  if (strlen($test)!=1)
  {
    throw new error(__FILE__, __LINE__, "Invalid length for test", strlen($test), NULL);
  }
  ///////////////////////////
  //
  if ((ord($test)<65) || ((ord($test)>90) && (ord($test)<97)) || (ord($test)>122))
  {
    return false;
  }
  return true;
} // function is_letter($test)


function is_time($test)
{
  // Returns true if the test is a valid time HH:MM:SS
  //
  // $test is a string
  //
  // Returns boolean
  //
  //
  // Version 1 * Char-Lez Braden * 2009-10-21
  //  * Basic function
  //
  //
  if (!is_string($test))
  {
    throw new error(__FILE__, __LINE__, "Invalid type for test", gettype($test), NULL);
  } // if (!is_string($test))
  ///////////////////////////
  //
  if (strlen($test)!=8)
  {
    return false;
  }
  //
  $parts=explode(':', $test);
  if (count($parts)!=3)
  {
    return false;
  }
  //
  foreach($parts as $k=>$v)
  {
    if (!is_all_digits($v))
    {
      return false;
    } // if (!is_all_digits($v))
  } // foreach($parts as $k=>$v)
  //
  if (($parts[0]>23) || ($parts[1]>59) || ($parts[2]>59))
  {
    return false;
  }
  //
  return true;
} // function is_time($test)



function is_all_digits($test)
{
  // Returns true if the test is a digit, false otherwise
  //
  // $test is a string
  //
  // No globals
  //
  // returns boolean
  //
  //
  // Version 1 * Char-Lez Braden * 2008-10-28
  //  * Basic function
  //
  //
  if (!is_string($test))
  {
    throw new error(__FILE__, __LINE__, "Invalid type for test", gettype($test), NULL);
  } // if (!is_string($test))
  if (strlen($test)==0)
  {
    throw new error(__FILE__, __LINE__, "Invalid length for test", strlen($test), NULL);
  }
  ///////////////////////////
  //
  for($a=0; $a<strlen($test); ++$a)
  {
    if (!is_digit(substr($test, $a, 1)))
    {
      return false;
    }
  } // for($a=0; $a<strlen($test); ++$a)
  return true;
} // function is_all_digits($test)
