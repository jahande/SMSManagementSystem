<center>
<h1>
ارسال پیام
</h1>
</center>
<center>
<table border=0>
	<tr style="direction:rtl;">
		<td>آدرس دریافت</td>
		<td><input type='text' style="direction:ltr;" id='recaddr' name='address' value='127.0.0.30/router/baseReciver'/></td>
	</tr>
	
	<tr style="direction:rtl;background-color:rgb(222,235,245);">
		<td style="direction:rtl;">به</td>
		<td><input type='text' name='to' value='مهم نیست'/></td>
	</tr>
	<tr style="direction:rtl;">
		<td>از</td>
		<td><input type='text' style="direction:ltr;" id='from_tel' name='from' value='+989122080031'/></td>
	</tr>
	<tr style="direction:rtl;background-color:rgb(222,235,245);">
		<td>متن پیام</td>
		<td><textarea  name='subject' id='msg'>سلام</textarea></td>
	</tr>
	<tr style="direction:rtl;">
		<td></td>
		<td></td>
	</tr>			
	<tr style="direction:rtl;">
		<td></td>
		<td><input onClick='sendSMS()' type='submit' value='بفرست'/></td>
	</tr>	
	<tr style="direction:rtl;">
		<td colspan=2 id="result"></td>
		
	</tr>	
</table>
</center>