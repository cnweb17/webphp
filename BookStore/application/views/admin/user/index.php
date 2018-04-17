<?php
print_r($records);
echo "
<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
	</tr>";
foreach ($records as $r) {
	echo "<tr>
		<td>".$r->roll_no."</td>
		<td>".$r->Name."</td>
		</tr>";
}
echo "</table>";
?>