

<?php 
header("Content-Type: application/xml; charset=ISO-8859-1");
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>

<title>TUGAS</title>
<link>http://lepkom.gunadarma.ac.id/</link>
<description>Silahkan Klik Tugas Untuk Update</description>
<language>id</language>
<managingEditor>Lepkom Mobile Learning</managingEditor>
<copyright>Copyright 2016 Lepkom Mobile Learning</copyright>
<?php
include "config.php"; 
if(isset($_REQUEST['idc']) && isset($_REQUEST['idu'])) {
	$query = "select c.id as course, c.fullname,a.userid, d.username, b.name, a.id as id_sub, a.assignment,a.grade from mdl_assignment_submissions as a 
			  inner join mdl_assignment as b on b.id=a.assignment inner join mdl_course as c on c.id=b.course 
			  inner join mdl_user as d on d.id=a.userid and c.id='".$_GET['idc']."' and a.userid='".$_GET['idu']."'"; 
	$run = mysql_query($query); 
	while($b=mysql_fetch_array($run)){
	?>
	<item>
	<title><?php echo "$b[name]"; ?></title>
	<pubDate><?php echo "$b[course]"; ?></pubDate>
	<link><?php echo "$b[assignment]"; ?></link>
	<category><?php echo "$b[id_sub]"; ?></category>
	<description><?php echo "$b[userid]"; ?></description>
	</item>
	<?php } ?>
<?php } ?>
</channel>
</rss>
<?php mysql_close(); ?>