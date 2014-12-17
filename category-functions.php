<?php
	function dispcategories() {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT * FROM categories");
		if (mysqli_num_rows($select) != 0) {
			while ($row = mysqli_fetch_assoc($select)) {
				echo "<table class='category-table' width='100%'>";
				echo "<tr><td class='main-category' colspan='2'>".$row['category_title']."</td></tr>";
				dispsubcategories($row['cat_id']);
				echo "</table>";
			}
		} else {
			echo "this forum is brand new and I still gotta come up with categories! durp";
		}
	}

	function dispsubcategories($parent_id) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT cat_id, subcat_id, subcategory_title, subcategory_desc FROM categories, subcategories WHERE ($parent_id = categories.cat_id) AND ($parent_id = subcategories.parent_id)");
		echo "<tr><th width='90%'>Categories</td><th width='10%'>Topics</td></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td class='category-title'><a href='/forum/topics/".$row['cat_id']."/".$row['subcat_id']."'>".$row['subcategory_title']."<br />";
			echo $row['subcategory_desc']."</a></td>";
			echo "<td class='num-topics'>".getnumtopics($parent_id, $row['subcat_id'])."</td></tr>";
		}
	}
?>