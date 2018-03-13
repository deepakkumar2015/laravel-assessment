<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>Export: laraveldb - Adminer</title>
<link rel="stylesheet" type="text/css" href="?file=default.css&amp;version=4.3.1&amp;driver=mysql">
<script type="text/javascript" src="?file=functions.js&amp;version=4.3.1&amp;driver=mysql"></script>
<link rel="shortcut icon" type="image/x-icon" href="?file=favicon.ico&amp;version=4.3.1&amp;driver=mysql">
<link rel="apple-touch-icon" href="?file=favicon.ico&amp;version=4.3.1&amp;driver=mysql">

<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
</script>

<div id="help" class="jush-sql jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
<p id="breadcrumb"><a href=".">MySQL</a> &raquo; <a href='?username=vagrant' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="?username=vagrant&amp;db=laraveldb">laraveldb</a> &raquo; Export
<h2>Export: laraveldb</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>

<form action="" method="post">
<table cellspacing="0">
<tr><th>Output<td><label><input type='radio' name='output' value='text' checked>open</label><label><input type='radio' name='output' value='file'>save</label><label><input type='radio' name='output' value='gz'>gzip</label>
<tr><th>Format<td><label><input type='radio' name='format' value='sql' checked>SQL</label><label><input type='radio' name='format' value='csv'>CSV,</label><label><input type='radio' name='format' value='csv;'>CSV;</label><label><input type='radio' name='format' value='tsv'>TSV</label>
<tr><th>Database<td><select name='db_style'><option selected><option>USE<option>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='routines' value='1' checked>Routines</label><label><input type='checkbox' name='events' value='1' checked>Events</label><tr><th>Tables<td><select name='table_style'><option><option selected>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='auto_increment' value='1'>Auto Increment</label><label><input type='checkbox' name='triggers' value='1' checked>Triggers</label><tr><th>Data<td><select name='data_style'><option><option>TRUNCATE+INSERT<option selected>INSERT<option>INSERT+UPDATE</select></table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="570979:593049">

<table cellspacing="0">
<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables' checked onclick='formCheck(this, /^tables\[/);'>Tables</label><th style='text-align: right;'><label class='block'>Data<input type='checkbox' id='check-data' checked onclick='formCheck(this, /^data\[/);'></label></thead>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='migrations' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">migrations</label><td align='right'><label class='block'><span id='Rows-migrations'></span><input type='checkbox' name='data[]' value='migrations' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='players' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">players</label><td align='right'><label class='block'><span id='Rows-players'></span><input type='checkbox' name='data[]' value='players' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='teams' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">teams</label><td align='right'><label class='block'><span id='Rows-teams'></span><input type='checkbox' name='data[]' value='teams' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='users' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">users</label><td align='right'><label class='block'><span id='Rows-users'></span><input type='checkbox' name='data[]' value='users' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<script type='text/javascript'>ajaxSetHtml('?username=vagrant&db=laraveldb&script=db');</script>
</table>
</form>
</div>

<form action='' method='post'>
<div id='lang'>Language: <select name='lang' onchange="this.form.submit();"><option value="en" selected>English<option value="ar">العربية<option value="bg">Български<option value="bn">বাংলা<option value="bs">Bosanski<option value="ca">Català<option value="cs">Čeština<option value="da">Dansk<option value="de">Deutsch<option value="el">Ελληνικά<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fi">Suomi<option value="fr">Français<option value="gl">Galego<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ko">한국어<option value="lt">Lietuvių<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select> <input type='submit' value='Use' class='hidden'>
<input type='hidden' name='token' value='212004:165598'>
</div>
</form>
<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="570979:593049">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target='_blank' id='h1'>Adminer</a> <span class="version">4.3.1</span>
<a href="https://www.adminer.org/#download" target="_blank" id="version">4.6.2</a>
</h1>
<script type="text/javascript" src="?file=jush.js&amp;version=4.3.1&amp;driver=mysql"></script>
<script type="text/javascript">
var jushLinks = { sql: [ '?username=vagrant&db=laraveldb&table=$&', /\b(migrations|players|teams|users)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.7');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="vagrant"><span title='database'>DB</span>: <select name='db' onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'><option value=""><option>information_schema<option selected>laraveldb<option>mysql<option>performance_schema<option>perkdbdev<option>sys</select><input type='submit' value='Use' class='hidden'>
<input type="hidden" name="dump" value=""></p></form>
<p class='links'><a href='?username=vagrant&amp;db=laraveldb&amp;sql='>SQL command</a>
<a href='?username=vagrant&amp;db=laraveldb&amp;import='>Import</a>
<a href='?username=vagrant&amp;db=laraveldb&amp;dump=' id='dump' class='active '>Export</a>
<a href="?username=vagrant&amp;db=laraveldb&amp;create=">Create table</a>
<ul id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>
<li><a href="?username=vagrant&amp;db=laraveldb&amp;select=migrations" class='select'>select</a> <a href="?username=vagrant&amp;db=laraveldb&amp;table=migrations" class='structure' title='Show structure'>migrations</a>
<li><a href="?username=vagrant&amp;db=laraveldb&amp;select=players" class='select'>select</a> <a href="?username=vagrant&amp;db=laraveldb&amp;table=players" class='structure' title='Show structure'>players</a>
<li><a href="?username=vagrant&amp;db=laraveldb&amp;select=teams" class='select'>select</a> <a href="?username=vagrant&amp;db=laraveldb&amp;table=teams" class='structure' title='Show structure'>teams</a>
<li><a href="?username=vagrant&amp;db=laraveldb&amp;select=users" class='select'>select</a> <a href="?username=vagrant&amp;db=laraveldb&amp;table=users" class='structure' title='Show structure'>users</a>
</ul>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
