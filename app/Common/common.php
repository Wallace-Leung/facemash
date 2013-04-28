<?php

function niceDate($time_stamp)
{
	$time_now=time();
	$time_diff=$time_now-$time_stamp;
	$get_time="";
	
	if($time_diff<60)
		$get_time="刚刚";
	else if($time_diff<60*60)
		$get_time.=floor($time_diff/(60))."分钟前";
	else if($time_diff<24*60*60)
		$get_time.=floor($time_diff/(60*60))."小时前";
	else if($time_diff<30*24*60*60)
		$get_time=floor($time_diff/(24*60*60))."天前";
	else if($time_diff<365*24*60*60)
		$get_time=floor($time_diff/(30*24*60*60))."个月前";
	else if($time_diff>365*24*60*60)
		$get_time=floor($time_diff/(365*24*60*60))."年前";
	else
		$get_time="";
	
	return $get_time;
}