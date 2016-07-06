<?php
$g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
$j_month_name = array("", "Farvardin", "Ordibehesht", "Khordad", "Tir",
                      "Mordad", "Shahrivar", "Mehr", "Aban", "Azar",
                      "Dey", "Bahman", "Esfand");

function div($a, $b)
{
   return (int) ($a / $b);
} 
  
function gregorian_to_jalali($g_y, $g_m, $g_d)
{
   global $g_days_in_month;
   global $j_days_in_month;
   
   $gy = $g_y-1600;
   $gm = $g_m-1;
   $gd = $g_d-1;

   $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400);

   for ($i=0; $i < $gm; ++$i)
      $g_day_no += $g_days_in_month[$i];
   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0)))
      /* leap and after Feb */
      ++$g_day_no;
   $g_day_no += $gd;
 
   $j_day_no = $g_day_no-79;
 
   $j_np = div($j_day_no, 12053);
   $j_day_no %= 12053;
 
   $jy = 979+33*$j_np+4*div($j_day_no,1461);

   $j_day_no %= 1461;
 
   if ($j_day_no >= 366) {
      $jy += div($j_day_no-1, 365);
      $j_day_no = ($j_day_no-1)%365;
   }
 
   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) {
      $j_day_no -= $j_days_in_month[$i];
   }
   $jm = $i+1;
   $jd = $j_day_no+1;


   return array($jy, $jm, $jd);
}

function farsiNow(){
	$fn = gregorian_to_jalali(date('y'), date('m'), date('d'));
	$time = date("His");
	return "{$fn[0]}{$fn[1]}{$fn[2]}$time";
}

function farsinum($str)
{
  if (strlen($str) == 1)
      $str = "0".$str;
  $out = "";
  for ($i = 0; $i < strlen($str); ++$i) {
    $c = substr($str, $i, 1); 
    $out .= pack("C*", 0xDB, 0xB0 + $c);
  }
  return $out;
}

function date_format($datestamp)
{
  $tzoffset = 0;
  list($date,$time) = explode(" ",$datestamp);
  list($year,$month,$day) = explode("-",$date);
  list($hour,$minute,$second) = explode(":",$time);
  $hour = $hour + $tzoffset;

  list($jyear, $jmonth, $jday) = gregorian_to_jalali($year,$month,$day);

  $sDate = farsinum($jyear - 1300)."/".farsinum($jmonth)."/".farsinum($jday)
           ."&nbsp;&nbsp;".farsinum($hour).":".farsinum($minute);
    
  return "<span lang='fa' dir='rtl'>" . $sDate . "</span>";
}
