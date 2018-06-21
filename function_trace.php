/**
*
* @param $message [any] whatever data you want to see displayed with this trace line
*/
function trace($message='')
{
	try
	{
		$type=gettype($message);
		switch ($type)
		{
			case 'array': {
				$message_display="A:[".serialize($message)."]";
			break; }
			//
			case 'boolean': {
				if ($message===TRUE)
				{
					$value='TRUE';
				}
				else
				{
					$value='FALSE';
				}
				$message_display="B:[$value]";
			break; }
			//
			case 'double': {
				$message_display="D:[$message]";
			break; }
			//
			case 'float': {
				$message_display="F:[$message]";
			break; }
			//
			case 'integer': {
				$message_display="I:[$message]";
			break; }
			//
			case 'null': {
				$message_display="N:[]";
			break; }
			//
			case 'object': {
				try
				{
					$message_display="O:[".serialize($message)."]";
				}
				catch (Throwable $e)
				{
          $class=get_class($message);
					$message_display='?:[CANNOT DISPLAY OBJECT: $class]';
				} // try
			break; }
			//
			case 'resource': {
				try
				{
					$message_display="R:[".serialize($message)."]";
				}
				catch (Throwable $e)
				{
					$message_display='?:[CANNOT DISPLAY RESOURCE]';
				} // try
			break; }
			//
			case 'string': {
				if ($message==='')
				{
					$message_display='';
				}
				else
				{
					$message_display="S:[$message]";
				}
			break; }
			//
			default: {
				$message_display="?:[CANNOT DISPLAY MESSAGE ($type)]";
			break;}
		} // switch ($type)
		//
		$origin=base::backtrace_origin(debug_backtrace());
		print $origin['origin']." [$message_display] <br>\n";
		//
		return;
	}
	catch (Throwable $e)
	{
		throw new fault('Cannot trace', '', $e);
	} // try
} // trace()
