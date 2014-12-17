<?php
	function disptopics($cid, $scid) {
		include ('dbconn.php');
		include ('reply-functions.php');
		$select = mysqli_query($con, "SELECT topic_id, author, title, date_posted FROM categories, subcategories, topics WHERE ($cid = topics.category_id) AND ($scid = topics.subcategory_id) AND ($cid = categories.cat_id) AND ($scid = subcategories.subcat_id) ORDER BY topic_id DESC");
		if (mysqli_num_rows($select) != 0) {
			echo "<table class='topic-table' width='100%'>";
			echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th><th>Replies</th></tr>";
			while ($row = mysqli_fetch_assoc($select)) {
				echo "<tr><td><a href='/forum/readtopic/".$cid."/".$scid."/".$row['topic_id']."'>".$row['title']."</a></td><td>".$row['author']."</td><td>".$row['date_posted']."</td><td></td><td>".countReplies($cid, $scid, $row['topic_id'])."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p>this category has no topics yet!  <a href='/forum/newtopic/".$cid."/".$scid."'>add the very first topic like a boss!</a></p>";
		}
	}

	function disptopic($cid, $scid, $tid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT cat_id, subcat_id, topic_id, author, title, content, date_posted FROM categories, subcategories, topics WHERE ($cid = categories.cat_id) AND ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id)");
		$row = mysqli_fetch_assoc($select);
		echo nl2br("<div class='content'><h2 class='title'>".$row['title']."</h2><p>".$row['author']."\n".$row['date_posted']."</p></div>");
		echo "<div class='content'><p>".$row['content']."</p></div>";
	}

	function getnumtopics($cat_id, $subcat_id) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT category_id, subcategory_id FROM topics WHERE ".$cat_id." = category_id AND ".$subcat_id." = subcategory_id");
		return mysqli_num_rows($select);
	}
?>